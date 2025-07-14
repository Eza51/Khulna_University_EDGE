<?php

namespace App\Http\Controllers;

use App\Models\TeacherType;
use Illuminate\Http\Request;

class TeacherTypeController extends Controller
{
    // Display a listing of the teacher types
    public function index()
    {
        // Fetch all teacher types
        $teacherTypes = TeacherType::all();
        
        // Return the index view with teacher types
        return view('admin.teacher_type.index', compact('teacherTypes'));
    }

    // Show the form for creating a new teacher type
    public function create()
    {
        // Return the create view
        return view('admin.teacher_type.create');
    }

    // Store a newly created teacher type in storage
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255|unique:teacher_types,name', // Validation for 'name'
        ]);

        // Create a new teacher type
        TeacherType::create([
            'name' => $request->name,
        ]);

        // Redirect with success message
        return redirect()->route('teacherTypes.index')->with('success', 'Teacher Type added successfully!');
    }

    // Remove the specified teacher type from storage
    public function destroy($id)
    {
        // Find the teacher type by ID
        $teacherType = TeacherType::findOrFail($id);

        // Delete the teacher type
        $teacherType->delete();

        // Redirect with success message
        return redirect()->route('teacherTypes.index')->with('success', 'Teacher Type deleted successfully!');
    }
}
