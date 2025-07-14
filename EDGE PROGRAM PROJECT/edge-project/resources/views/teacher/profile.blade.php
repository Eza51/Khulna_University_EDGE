@extends('teacher.layouts.master') <!-- Extend your main layout file -->

@section('content')
    <div class="container profile-container">
        <div class="profile-details card">
            <div class="card-body">
                <h2 class="profile-heading">Your Profile Information</h2> <!-- Move heading here to ensure it's on top -->

                <!-- Profile Picture -->
                <div class="profile-picture">
                    @if ($profilePicture)
                        <img src="{{ $profilePicture }}" alt="Profile Picture" class="img-fluid rounded-circle" style="max-width: 150px;">
                    @else
                        <img src="{{ asset('images/default-profile.jpg') }}" alt="Default Profile Picture" class="img-fluid rounded-circle" style="max-width: 150px;">
                    @endif
                </div>

                <!-- Table to display profile information -->
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td><strong>Name:</strong></td>
                            <td>{{ $teacher->name }}</td>
                        </tr>
                    
                        <tr>
                            <td><strong>Email:</strong></td>
                            <td>{{ $teacher->email }}</td>
                        </tr>
                        
                        <!-- Display assigned courses -->
                        <tr>
                            <td><strong>Assigned Courses:</strong></td>
                            <td>
                                @if ($assignedCourses->isEmpty())
                                    No courses assigned.
                                @else
                                    <ul>
                                        @foreach ($assignedCourses as $course)
                                            <li>{{ $course->name }}</li> <!-- Display the course name -->
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                        </tr>
                        
                        <tr>
                            <td><strong>University:</strong></td>
                            <td>{{ $universityId ? $teacher->university->name : 'Not assigned' }}</td>
                        </tr>
                    </tbody>
                </table>

                <!-- Display the teacher's schedules -->
                <h3>Schedules</h3>
                @if ($schedules->isEmpty())
                    <p>No schedules available.</p>
                @else
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Room Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schedules as $schedule)
                                <tr>
                                    <td>{{ $schedule->course->name }}</td>
                                    <td>{{ $schedule->date }}</td>
                                    <td>{{ $schedule->start_time ?? 'N/A' }}</td>
                                    <td>{{ $schedule->end_time ?? 'N/A' }}</td>
                                    <td>{{ $schedule->room_number }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection

<style>
    .profile-container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: 100vh;
        padding: 20px;
    }

    .profile-details {
        width: 100%;
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .profile-heading {
        text-align: left;
        font-size: 2rem;
        margin-bottom: 20px;
        color: #333;
    }

    .card-body {
        padding: 15px;
    }

    .table {
        width: 100%;
        margin-bottom: 20px;
        font-size: 1.1rem;
    }

    .table-bordered {
        border: 1px solid #ddd;
    }

    .table-bordered td, .table-bordered th {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .table-striped tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    .table-striped tbody tr:nth-child(even) {
        background-color: #ffffff;
    }

    .profile-picture {
        text-align: center;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .table td, .table th {
            font-size: 0.9rem;
            padding: 8px;
        }
    }
</style>
