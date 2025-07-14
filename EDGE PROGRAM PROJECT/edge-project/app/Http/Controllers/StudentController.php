<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     *$data['courses'] = Course::all();:
     * Fetches all records from the courses table and stores them in the $data['courses'] array.
     */
    public function index()
{
    // Fetch all students by filtering the role
    $data['students'] = User::where('role', 'student')->get();  // Fetch students only

    // Fetch all courses
    $data['courses'] = Course::all(); 

    // Pass the students and courses data to the view
    return view('admin.student.student', $data);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
     // Store student data
     public function store(Request $request)
{
    // Validate the input
    $request->validate([
        'name' => 'required|string|max:255',
        'father_name' => 'required|string|max:255',
        'mother_name' => 'required|string|max:255',
        'mobile_number' => 'required|string|max:15',
        'dob' => 'required|date',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        'course_id' => 'required|exists:courses,id', 
    ]);

    // Handle the file upload for profile picture
    $profilePicturePath = null;
    if ($request->hasFile('profile_picture')) {
        $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
    }

    // Create the user and save to database
    $user = new User();
    $user->name = $request->name;
    $user->father_name = $request->father_name;
    $user->mother_name = $request->mother_name;
    $user->mobile_number = $request->mobile_number;
    $user->dob = $request->dob;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->profile_picture = $profilePicturePath;
    $user->course_id = $request->course_id;
    $user->role = 'student'; // Setting the default role to 'student'
    $user->save();

    return redirect()->route('student.create')->with('success', 'Student added successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function read(Request $request)
    {
        $query = User::with(['course']) // Load related course
            ->where('role', 'student') // Only retrieve students
            ->latest('id'); // Sort by latest ID
    
        if ($request->filled('course_id')) {
            $query->where('course_id', $request->get('course_id'));
        }
    
        $students = $query->get();
        $data['students'] = $students;
        $data['courses'] = Course::all(); // Retrieve all courses
    
        return view('admin.student.index', $data); // Ensure this path exists
    }
    

    public function edit($id)
    {
        $data['courses'] = Course::all(); // Fetch all courses
        $data['student'] = User::findOrFail($id); // Fetch the student by ID
    
        return view('admin.student.edit', $data); // Return the view with student and courses data
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Find the student record by ID
    $student = User::findOrFail($id);

    // Validate input fields (additional validation can be added as needed)
    $request->validate([
        'name' => 'required|string|max:255',
        'father_name' => 'required|string|max:255',
        'mother_name' => 'required|string|max:255',
        'mobile_number' => 'required|string|max:15',
        'dob' => 'required|date',
        'email' => 'required|email|unique:users,email,' . $student->id,
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'course_id' => 'required|exists:courses,id',
    ]);

    // Update student details
    $student->name = $request->name;
    $student->father_name = $request->father_name;
    $student->mother_name = $request->mother_name;
    $student->mobile_number = $request->mobile_number;
    $student->dob = $request->dob;
    $student->email = $request->email;
    $student->course_id = $request->course_id;

    // If a new profile picture is uploaded, save it
    if ($request->hasFile('profile_picture')) {
        $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        $student->profile_picture = $profilePicturePath;
    }

    // Save updated student information
    $student->save();

   // Redirect back to the edit page with a success message
   return back()->with('success', 'Student updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the student by ID
        $student = User::findOrFail($id);
    
        // Delete the student record
        $student->delete();
    
        // Redirect back with a success message
        return redirect()->route('student.read')->with('success', 'Student deleted successfully.');
    }
    

}
