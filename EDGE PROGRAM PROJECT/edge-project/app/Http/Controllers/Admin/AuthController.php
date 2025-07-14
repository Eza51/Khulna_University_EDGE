<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;  // Ensure you import the User model at the top
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login.login');
    }
    public function dashboard()
    {
        
        return view('admin.dashboard.dashboard');
    }
    public function authenticate(Request $req)
    {
        $req->validate(
            [
                'email' => 'required|email', // Make sure the email is properly validated
                'password' => 'required'
            ]
        );
        if (Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password])) {
            if (Auth::guard('admin')->user()->role != 'admin') //if not admin
            {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error', 'Unauthorized User. Access denied');
            }
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with('error', 'Something went wrong');
        }
    }

    public function register()
    {
        $user = new User();
        $user->name = 'reaz mahmud';
        $user->role = 'teacher';
        $user->email = 'reazmahmud@gmail.com';
        $user->password = Hash::make('123456');
        $user->save();
        return redirect()->route('admin.login')->with('Success', 'User Created Succesfully');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('sucess','Succesfully logged out');
    }
}