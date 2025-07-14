<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * <!-- Author: Nowshin Eza Admin Login page for the Khulna University EDGE Management System-->
     */
    public function index()
    {
           // Fetch all courses from the database
           $courses = Course::all(); 

           // Pass courses data to the home page (front-end.index) for the homepage view
           // You can choose not to display them on the homepage, only pass them if you need.
           return view('front-end.index', compact('courses'));
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
    public function showLoginSelection()
    {
        return view('front-end.login-selection');
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
   
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}
