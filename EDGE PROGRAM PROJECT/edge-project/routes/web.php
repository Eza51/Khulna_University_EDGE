<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ScheduleController;
use App\Http\Middleware\TeacherAuthenticate;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\AnnoucementController;
use App\Http\Controllers\TeacherTypeController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AssignTeacherController;
use App\Http\Controllers\CourseTeacherController;
use App\Http\Controllers\Student\AuthController as StudentAuthController;
use App\Http\Controllers\Teacher\AuthController as TeacherAuthController;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route to render the home page (without courses)
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Route to display courses
Route::get('/courses', [HomeController::class, 'show'])->name('courses.show');

// Login selection page (using HomeController)
Route::get('/login-selection', [HomeController::class, 'showLoginSelection'])->name('login.selection');



Route::group(['prefix' => 'teacher'], function () {
    // Routes for guests (teacher.guest middleware)
    Route::group(['middleware' => 'teacher.guest'], function () {
        // Teacher Login Page
        Route::get('login', [TeacherAuthController::class, 'index'])->name('teacher.login');

        // Teacher Login Submission
        Route::post('authenticate', [TeacherAuthController::class, 'authenticate'])->name('teacher.authenticate');
    });

    // Routes for authenticated teachers (teacher.auth middleware)
    Route::group(['middleware' => 'teacher.auth'], function () {
        // Teacher Dashboard (after login)
        Route::get('dashboard', [TeacherAuthController::class, 'dashboard'])->name('teacher.dashboard');

        // Teacher Logout
        Route::get('logout', [TeacherAuthController::class, 'teacherLogout'])->name('teacher.logout');

        // Teacher Profile
        Route::get('profile', [TeacherAuthController::class, 'showProfile'])->name('teacher.profile');

        // Route to show the password change form
        Route::get('change-password', [TeacherAuthController::class, 'showChangePasswordForm'])->name('teacher.change-password');

        // Route for changing password
        Route::post('change-password', [TeacherAuthController::class, 'changePassword'])->name('teacher.changePasswordSubmit');
    });
});



Route::group(['prefix' => 'student'], function () {
    // Routes for guests (guest middleware)
    Route::group(['middleware' => 'guest'], function () {
        // Student Login Page
        Route::get('login', [StudentAuthController::class, 'index'])->name('student.login');

        // Student Registration Page (optional if required)
        // Route::get('/register', [UserController::class, 'register'])->name('student.register');

        // Student Login Submission
        Route::post('authenticate', [StudentAuthController::class, 'authenticate'])->name('student.authenticate');
    });

    // Routes for authenticated students (auth middleware)
    Route::middleware('auth')->group(function () {
        // Student Dashboard (after login)
        Route::get('dashboard', [StudentAuthController::class, 'dashboard'])->name('student.dashboard');

        // Student Logout
        Route::get('student/logout', [StudentAuthController::class, 'studentlogout'])->name('student.logout');
        Route::get('profile', [StudentAuthController::class, 'showProfile'])->name('student.profile');

        // Route to show the password change form
        Route::get('/change-password', [StudentAuthController::class, 'showChangePasswordForm'])->name('student.change-password');
        // Route for changing password
        Route::post('/change-password', [StudentAuthController::class, 'changePassword'])->name('student.changePasswordSubmit');
    });
});
Route::group(['prefix' => 'admin'], function () {

    // Guest Routes (for unauthenticated users)
    Route::group(['middleware' => 'admin.guest'], function () {
        // Show login form for admin
        Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.login');

        // Registration page for admin (if required)
        Route::get('register', [AuthController::class, 'register'])->name('admin.register');

        // Authentication POST request for admin
        Route::post('authenticate', [AuthController::class, 'authenticate'])->name('admin.authenticate');
    });

    // Authenticated Admin Routes (for logged-in admins)
    Route::group(['middleware' => 'admin.auth'], function () {
        // Logout route for admin (POST)
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');


        // Admin dashboard
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');

        Route::resource('course', CourseController::class);
        Route::resource('university', UniversityController::class);
        Route::resource('teacherTypes', TeacherTypeController::class)->except(['show', 'edit', 'update']);
        // Resource route for TeacherController
        Route::resource('teacher', TeacherController::class);

        Route::get('schedules/create', [ScheduleController::class, 'index'])->name('schedules.create'); // Display form
        Route::post('schedules/store', [ScheduleController::class, 'store'])->name('schedules.store');
        Route::get('schedules/show', [ScheduleController::class, 'show'])->name('schedules.index');
        Route::delete('schedules/{id}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');





        // Handle form submission

        Route::get('assign-teacher/create', [AssignTeacherController::class, 'index'])->name('assign-teacher.create');

        Route::post('/assign-teacher/store', [AssignTeacherController::class, 'store'])->name('assign-teacher.store');
        Route::get('assign-teacher/show', [AssignTeacherController::class, 'show'])->name('assign-teacher.show');
        // Handle form submission

        
    // Route to display all announcements
    Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement.index');

    // Route to show the form for creating a new announcement
    Route::get('create', [AnnouncementController::class, 'create'])->name('announcement.create');

    // Route to store a new announcement
    Route::post('store', [AnnouncementController::class, 'store'])->name('announcement.store');

    // Route to show the form to edit an existing announcement
    Route::get('edit/{announcement}', [AnnouncementController::class, 'edit'])->name('announcement.edit');

    // Route to update an existing announcement
    Route::put('update/{announcement}', [AnnouncementController::class, 'update'])->name('announcement.update');

    // Route to delete an announcement
    Route::delete('destroy/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');


        // student Management
        Route::get('student/create', [StudentController::class, 'index'])->name('student.create');

        Route::get('student/read', [StudentController::class, 'read'])->name('student.read');


        Route::post('student/store', [StudentController::class, 'store'])->name('student.store');

        // Route::get('student/read', [StudentController::class, 'read'])->name('student.read');

        Route::get('student/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');

        Route::get('student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');

        Route::put('student/update/{id}', [StudentController::class, 'update'])->name('student.update');
    });
});
