<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\University;
use App\Models\TeacherType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of teachers.
     */
    public function index()
    {
        // Fetch all teachers with their university and teacher type details, filtering by the role 'teacher'
        $data['teachers'] = User::with(['university', 'teacherType'])
                                ->where('role', 'teacher')  // Only select teachers
                                ->get();
        
        return view('admin.teacher.index', $data);
    }

    /**
     * Show the form for creating a new teacher.
     */
    public function create()
    {
        // Fetch all universities and teacher types
        $data['universities'] = University::all();
        $data['teacherTypes'] = TeacherType::all();
        $data['courses'] = Course::all(); // Fetch courses
        

        return view('admin.teacher.create', $data);
    }

    /**
     * Store a newly created teacher in storage.
     */
    public function store(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'university_id' => 'required|exists:universities,id',
            'teacher_type_id' => 'required|exists:teacher_types,id',
            'mobile_number' => 'nullable|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'courses' => 'required|array', // Ensure the courses field is an array
           
        ]);

        // Handle file upload for profile picture
        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        // Create a new teacher and save it to the database
        $teacher = new User();
        $teacher->name = $request->name;
        $teacher->university_id = $request->university_id;
        $teacher->teacher_type_id = $request->teacher_type_id;
        $teacher->mobile_number = $request->mobile_number;
        $teacher->email = $request->email;
        $teacher->password = bcrypt($request->password);  // Store the hashed password
        $teacher->profile_picture = $profilePicturePath;
        $teacher->role = 'teacher'; // Assign 'teacher' role
        // Convert the selected courses array to a comma-separated string
      // Concatenate course IDs into a comma-separated string
    $teacher->course_id = implode(',', $request->courses);

        $teacher->save();
        
        
       

        return redirect()->route('teacher.index')->with('success', 'Teacher added successfully!');
    }

    /**
     * Show the form for editing the specified teacher.
     */
    public function edit($id)
    {
        // Fetch the teacher, universities, and teacher types for editing
        $data['teacher'] = User::findOrFail($id);
        $data['universities'] = University::all();
        $data['teacherTypes'] = TeacherType::all();

        return view('admin.teacher.edit', $data);
    }

    /**
     * Update the specified teacher in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'university_id' => 'required|exists:universities,id',
            'teacher_type_id' => 'required|exists:teacher_types,id',
            'mobile_number' => 'nullable|string|max:15',
            'email' => 'required|email|unique:users,email,' . $id,  // Ensure the email is unique except for the current teacher
            'password' => 'nullable|string|min:8|confirmed',  // Allow password to be optional (for update)
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Find and update the teacher's details
        $teacher = User::findOrFail($id);
        $teacher->name = $request->name;
        $teacher->university_id = $request->university_id;
        $teacher->teacher_type_id = $request->teacher_type_id;
        $teacher->mobile_number = $request->mobile_number;
        $teacher->email = $request->email;

        if ($request->filled('password')) {
            $teacher->password = bcrypt($request->password);  // Hash the new password
        }

        // Handle file upload for profile picture (if any)
        if ($request->hasFile('profile_picture')) {
            // Delete the old profile picture if it exists
            if ($teacher->profile_picture) {
                Storage::disk('public')->delete($teacher->profile_picture);
            }
            $teacher->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $teacher->save();

        return redirect()->route('teacher.index')->with('success', 'Teacher updated successfully!');
    }

    /**
     * Remove the specified teacher from storage.
     */
    public function destroy($id)
    {
        // Find and delete the teacher
        $teacher = User::findOrFail($id);

        // Delete the profile picture if it exists
        if ($teacher->profile_picture) {
            Storage::disk('public')->delete($teacher->profile_picture);
        }

        $teacher->delete();

        return redirect()->route('teacher.index')->with('success', 'Teacher deleted successfully.');
    }
}
