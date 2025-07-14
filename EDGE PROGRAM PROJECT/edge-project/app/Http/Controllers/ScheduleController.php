<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        $teachers = User::where('role', 'teacher')->get();
    
        return view('admin.schedule.create', compact('courses', 'teachers'));
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
   // ScheduleController.php
   public function store(Request $request)
   {
     
       
       $validatedData = $request->validate([
           'course_id' => 'required|exists:courses,id',
           'teacher_id' => 'required|exists:users,id',
           'date' => 'required|date',
           'room_number' => 'required|string|max:50',
       ]);
   
       // Check if start_time and end_time exist in the request and set them to null if not
       $start_time = $request->input('start_time', null);
       $end_time = $request->input('end_time', null);
   
       // Create the schedule
       Schedule::create([
           'course_id' => $validatedData['course_id'],
           'teacher_id' => $validatedData['teacher_id'],
           'date' => $validatedData['date'],
           'start_time' => $start_time,
           'end_time' => $end_time,
           'room_number' => $validatedData['room_number'],
       ]);
   
       return redirect()->route('schedules.create')->with('success', 'Class schedule created successfully.');
   }
   

   


    /**
     * Display the specified resource.
     */
    public function show()
{
    // Get all schedules, with course and teacher relationships loaded
    $schedules = Schedule::with(['course', 'teacher'])->get();

    // Pass schedules to the view
    return view('admin.schedule.index', compact('schedules'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Find the schedule by ID and delete it
    $schedule = Schedule::findOrFail($id);
    $schedule->delete();

    // Redirect back to the schedules index page with a success message
    return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully.');
}

}
