<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use App\Models\Schedule;
use App\Models\Annoucement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class AuthController extends Controller
{
    /**
     * Display the login page.
     */
    public function index()
    {
        return view('teacher.login');
    }

    /**
     * Authenticate the teacher.
     */
    public function authenticate(Request $req)
{
    // Validate the request
    $req->validate([
        'email' => 'required|email', // Ensure email is valid
        'password' => 'required',     // Ensure password is provided
    ]);

    // Attempt login using the 'teacher' guard
    if (Auth::guard('teacher')->attempt(['email' => $req->email, 'password' => $req->password])) {
        // Check if the authenticated user has the 'teacher' role
        if (Auth::guard('teacher')->user()->role != 'teacher') { // If the user is not a teacher
            Auth::guard('teacher')->logout(); // Logout the user
            return redirect()->route('teacher.login')->with('error', 'Unauthorized user. Access denied!');
        }

        // Redirect to teacher dashboard after successful login
        return redirect()->route('teacher.dashboard');
    } else {
        // If login fails, redirect back to the login page with an error message
        return redirect()->route('teacher.login')->with('error', 'Invalid credentials. Please try again.');
    }
}


    /**
     * Show the teacher's dashboard.
     */
    public function dashboard()
{
    $announcements = Annoucement::where('type', 'Teacher')->get();
    return view('teacher.dashboard.dashboard', compact('announcements'));
}


    /**
     * Show the teacher's profile.
     */
  
     public function showProfile()
     {
         // Ensure the user is authenticated using the 'teacher' guard
         $teacher = Auth::guard('teacher')->user(); 
     
         // Redirect if the user is not authenticated
         if (!$teacher) {
             return redirect()->route('teacher.login')->with('error', 'You must be logged in to view your profile.');
         }
     
         // Check if the user has the 'teacher' role
         if ($teacher->role !== 'teacher') {
             return redirect()->route('teacher.login')->with('error', 'Access Denied: Only teachers can view this profile.');
         }
     
         // Get the profile picture path if exists
         $profilePicture = $teacher->profile_picture ? asset('storage/' . $teacher->profile_picture) : null;
     
         // Fetch the courses assigned to the teacher
         $assignedCourses = $teacher->assignedCourses; // Use the 'assignedCourses' relationship defined earlier
          // Fetch the teacher's schedules from the 'schedules' table, using 'teacher_id' to filter
    $schedules = Schedule::with('course')  // Eager load course for each schedule
    ->where('teacher_id', $teacher->id)  // Filter by the teacher's ID
    ->get();
     
         // Fetch the university ID (if available)
         $universityId = $teacher->university ? $teacher->university->id : null;
     
         // Pass the data to the view
         return view('teacher.profile', [
             'teacher' => $teacher,
             'profilePicture' => $profilePicture,
             'assignedCourses' => $assignedCourses, // Pass the assigned courses to the view
             'universityId' => $universityId, // Pass the university ID to the view
             'schedules' => $schedules, // Pass the teacher's schedules to the view
         ]);
     }
     

    /**
     * Change the teacher's password.
     */
    public function changePassword(Request $request)
    {
        // Validate the input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed', // 'confirmed' automatically checks the 'new_password_confirmation' field
            'new_password_confirmation' => 'required|same:new_password', // Explicitly define confirmation field
        ]);

        // Get the currently authenticated user
        $user = User::find(Auth::guard('teacher')->user()->id);
        //Auth::guard('teacher')->user();

        // Check if the current password matches the stored password
        if (Hash::check($request->current_password, $user->password)) {
            // If correct, update the password
            $user->password = Hash::make($request->new_password);

            // Save the updated password
            $user->update();

            // Redirect with success message
            return redirect()->route('teacher.change-password')->with('success', 'Your password has been changed successfully.');
        } else {
            // Return with an error if the current password is incorrect
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
    }

    /**
     * Show the password change form.
     */
    public function showChangePasswordForm()
    {
        return view('teacher.change-password');
    }

    /**
     * Log the teacher out.
     */
    public function teacherLogout()
    {
        Auth::guard('teacher')->logout(); // Log out the teacher using the 'teacher' guard
    return redirect()->route('teacher.login')->with('success', 'Successfully logged out'); // Redirect to the teacher login page with success message
    }
}
