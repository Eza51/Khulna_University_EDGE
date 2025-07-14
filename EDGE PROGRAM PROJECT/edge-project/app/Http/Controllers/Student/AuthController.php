<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Annoucement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student.login');
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
    public function authenticate(Request $request)
    {

        // Attempt login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Check if the authenticated user is not a student
            //checking auth...default guard is web

            if (Auth::user()->role != 'student') {
                Auth::logout(); // Log the user out if they are not a student
                return redirect()->route('student.login')->with('error', 'Unauthorized user. Access denied!');
            }

            // Redirect to student dashboard if authentication is successful
            return redirect()->route('student.dashboard');
        } else {
            // Handle failure
            return redirect()->route('student.login')->with('error', 'Invalid credentials. Please try again.');
        }
    }
    public function dashboard()
{
    $announcements = Annoucement::where('type', 'Student')->get();
    return view('student.dashboard.dashboard', compact('announcements'));
}

    public function showProfile()
{
    // Ensure the user is authenticated
    $student = Auth::user();

    // Check if the user is not logged in
    if (!$student) {
        return redirect()->route('student.login')->with('error', 'You must be logged in to view your profile.');
    }

    // Check if the user has the 'student' role
    if ($student->role != 'student') {
        return redirect()->route('student.login')->with('error', 'Access Denied: Only students can view this profile.');
    }

    // Get the profile picture path if exists
    $profilePicture = $student->profile_picture ? asset('storage/' . $student->profile_picture) : null;

    // Fetch the student's enrolled course
    $course = Course::find($student->course_id);

    // Fetch the schedule for the enrolled course
    $schedule = Schedule::where('course_id', $course->id)->first(); // Assuming one schedule for each course

    // Pass the student data, profile picture, course, and schedule to the view
    return view('student.profile', compact('student', 'profilePicture', 'course', 'schedule'));
}

    
    

    public function changePassword(Request $request)
    {
        // Validate the input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed', // 'confirmed' automatically checks the 'new_password_confirmation' field
            'new_password_confirmation' => 'required|same:new_password', // Explicitly define confirmation field
        ]);

        // Get the currently authenticated user
        $user = User::find(Auth::user()->id);

        // Check if the current password matches the stored password
        if (Hash::check($request->current_password, $user->password)) {
            // If correct, update the password
            $user->password = Hash::make($request->new_password);

            // Save the updated password
            $user->update();

            // Redirect with success message
            return redirect()->route('student.change-password')->with('success', 'Your password has been changed successfully.');
        } else {
            // Return with an error if the current password is incorrect
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
    }

    // Show the password change form
    public function showChangePasswordForm()
    {
        return view('student.change-password');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function studentlogout()
    {
        // Log out the authenticated user (web guard by default)
        Auth::logout();
    
        // Redirect to the student login page
        return redirect()->route('student.login')->with('success', 'Successfully logged out');
    }
}
