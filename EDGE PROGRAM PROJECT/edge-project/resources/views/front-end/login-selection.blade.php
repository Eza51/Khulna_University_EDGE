@extends('front-end.layouts.master')

@section('content')
@include('front-end.header')
@include('front-end.sub_header')

    <div class="login-selection-container">
        <div class="login-caption">
            <h2>Welcome to the Login Session of the Khulna University Edge Program</h2>
            <p>Please choose one of the following options to continue:</p>
        </div>

        <!-- Login Options -->
        <div class="login-options">
            <button class="btn btn-teacher" id="teacherBtn" onclick="window.location='{{ route('teacher.login') }}'">Login as Teacher</button>
            <button class="btn btn-student" id="studentBtn" onclick="window.location='{{ route('student.login') }}'">Login as Student</button>
        </div>

        <!-- Back to Home Button -->
        <div class="back-home-btn">
            <a href="{{ url('/') }}" class="btn btn-home" id="homeBtn" onclick="window.location='{{ url('/') }}'">Back to Home</a>
        </div>
    </div>
@endsection

<style>
    .login-selection-container {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        height: 100vh;
        background: linear-gradient(to right, #6a11cb, #2575fc);
        color: white;
        font-weight: bold;
        padding-top: 100px;
    }

    .login-caption {
        text-align: center;
        margin-bottom: 30px;
        padding: 0 20px;
    }

    .login-caption h2 {
        font-size: 2.5rem;
        margin-bottom: 10px;
    }

    .login-caption p {
        font-size: 1.2rem;
        margin-bottom: 30px;
    }

    .login-options {
        display: flex;
        gap: 30px;
        margin-bottom: 30px;
        justify-content: center;
    }

    /* Corporate Glossy Effect - Base Styles */
    .btn {
        padding: 15px 35px;
        font-size: 1.2rem;
        font-weight: bold;
        border: none;
        cursor: pointer;
        border-radius: 50px;
        position: relative;
        overflow: hidden;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Corporate Glossy Button Styles */
    .btn-teacher {
        background: linear-gradient(135deg, #1a3c5b, #345678);
        color: white;
    }

    .btn-teacher:hover {
        background: linear-gradient(135deg, #263d56, #2d4a63);
        transform: scale(1.05);
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
    }

    .btn-student {
        background: linear-gradient(135deg, #4c8f73, #6b9e85);
        color: white;
    }

    .btn-student:hover {
        background: linear-gradient(135deg, #3d6d56, #5f7c64);
        transform: scale(1.05);
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
    }

    .btn-home {
        padding: 12px 25px;
        font-size: 1.1rem;
        background: linear-gradient(135deg, #6c757d, #a0a0a0);
        color: white;
        border-radius: 50px;
        text-decoration: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-home:hover {
        background: linear-gradient(135deg, #5a6268, #8c8c8c);
        transform: scale(1.05);
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
    }

    .back-home-btn {
        margin-top: 30px;
    }
</style>

<script>
    // Optional: Add JS animation effects or interaction if needed
    const buttons = document.querySelectorAll('.btn');

    buttons.forEach(button => {
        button.addEventListener('mouseenter', () => {
            button.style.transition = 'all 0.3s ease';
        });

        button.addEventListener('mouseleave', () => {
            button.style.transition = 'all 0.3s ease';
        });
    });
</script>
