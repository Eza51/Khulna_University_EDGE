<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CourseTeacher;
use Illuminate\Support\Facades\DB;

class CourseTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {  
        
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
        
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(CourseTeacher $courseTeacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseTeacher $courseTeacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseTeacher $courseTeacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseTeacher $courseTeacher)
    {
        //
    }
}
