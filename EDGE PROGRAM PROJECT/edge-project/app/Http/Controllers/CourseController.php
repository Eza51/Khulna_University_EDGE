<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; // Import the Course model

class CourseController extends Controller
{
    // Display a listing of the courses
    public function index()
    {
        $courses = Course::all(); // Fetch all courses
    return view('admin.course.course', compact('courses')); // Pass courses to the view
    }

    // Show the form for creating a new course
    public function create()
    {
        return view('admin.course.create'); // Return the course creation form
    }
   

    // Store a newly created course in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:courses,name', // Validation for course name
        ]);

        // Create the course
        Course::create([
            'name' => $request->name,
        ]);

        return redirect()->route('course.create')->with('success', 'Course created successfully!');
    }

    // Show the form for editing the specified course
    public function edit($id)
    {
        $course = Course::findOrFail($id); // Find course by ID or fail
        return view('admin.course.edit', compact('course')); // Pass course to the edit view
    }

    // Update the specified course in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:courses,name,' . $id, // Validation for course name
        ]);

        $course = Course::findOrFail($id); // Find course by ID
        $course->update([
            'name' => $request->name,
        ]);

        return redirect()->route('course.edit', $course->id)->with('success', 'Course updated successfully!');
    }

    // Remove the specified course from the database
    public function destroy($id)
    {
        $course = Course::findOrFail($id); // Find course by ID
        $course->delete(); // Delete course

        return redirect()->route('course.index')->with('success', 'Course deleted successfully!');
    }
}
