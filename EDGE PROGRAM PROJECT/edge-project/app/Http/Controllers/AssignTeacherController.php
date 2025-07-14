<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\AssignTeacher;

class AssignTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Fetch all courses
    $data['courses'] = Course::all(); 
     // Fetch all teacher by filtering the role
     $data['teacher'] = User::where('role', 'teacher')->get();  // Fetch teacher only
      return view ('admin.assign_teacher.create', $data);
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
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'teacher_ids' => 'required|array',
            'teacher_ids.*' => 'exists:users,id',
        ]);
    
        // Iterate over each selected teacher
        foreach ($request->teacher_ids as $teacherId) {
            // Check if the teacher is already assigned to the course
            $existingAssignment = AssignTeacher::where('course_id', $request->course_id)
                                               ->where('teacher_id', $teacherId)
                                               ->first();
    
            // If the assignment does not exist, create it
            if (!$existingAssignment) {
                AssignTeacher::create([
                    'course_id' => $request->course_id,
                    'teacher_id' => $teacherId,
                ]);
            }
        }
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Teachers assigned to the course successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // Fetch teachers with their assigned courses
    $teachers = User::where('role', 'teacher')
    ->with('assignedCourses') // Assuming you have a relationship setup in the User model
    ->get();

return view('admin.assign_teacher.index', compact('teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssignTeacher $assignTeacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssignTeacher $assignTeacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignTeacher $assignTeacher)
    {
        //
    }
}
