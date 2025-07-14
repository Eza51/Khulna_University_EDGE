<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    // Display a listing of the universities
    public function index()
    {
        $universities = University::all();
        return view('admin.university.index', compact('universities'));
    }

    // Show the form for creating a new university
    public function create()
    {
        return view('admin.university.create');
    }

    // Store a newly created university in storage
    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            
        ]);

        // Create a new university
        University::create($validatedData);

        // Redirect with a success message
        return redirect()->route('university.index')->with('success', 'University added successfully!');
    }

    // Show the form for editing the specified university
    public function edit($id)
    {
        $university = University::findOrFail($id);
        return view('admin.university.edit', compact('university'));
    }

    
    // Update the specified university in the database
public function update(Request $request, $id)
{
    // Validate the incoming data
    $request->validate([
        'name' => 'required|string|max:255|unique:universities,name,' . $id, // Ensure the name is unique except for the current university
    ]);

    // Find the university by ID and update its data
    $university = University::findOrFail($id); // Find the university by its ID
    $university->update([
        'name' => $request->name,
    ]);

    // Redirect to the edit page for the updated university with a success message
    return redirect()->route('university.edit', $university->id)->with('success', 'University updated successfully!');
}


    // Remove the specified university from storage
    public function destroy($id)
    {
        // Find the university and delete it
        $university = University::findOrFail($id);
        $university->delete();

        // Redirect with a success message
        return redirect()->route('university.index')->with('success', 'University deleted successfully!');
    }
}
