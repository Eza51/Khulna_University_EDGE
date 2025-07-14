@extends('student.layouts.master') <!-- Extend your main layout file -->

@section('content')
    <div class="container profile-container">
        <div class="profile-details card">
            <div class="card-body">
                <h2 class="profile-heading">Your Profile Information</h2>

                <!-- Profile Picture -->
                <div class="profile-picture">
                    @if ($profilePicture)
                        <img src="{{ $profilePicture }}" alt="Profile Picture" class="img-fluid rounded-circle" style="max-width: 150px;">
                    @else
                        <img src="{{ asset('images/default-profile.jpg') }}" alt="Default Profile Picture" class="img-fluid rounded-circle" style="max-width: 150px;">
                    @endif
                </div>

                <!-- Table to display profile information -->
                {{-- // Note: This is a partial version of the original project.
// Some parts of the source code have been removed for privacy/security reasons. --}}


                <!-- Display the schedule for the enrolled course -->
                <h3>Course Schedule</h3>
                @if ($course && $schedule)
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
                            <tr>
                                <td>{{ $course->name }}</td>
                                <td>{{ $schedule->date }}</td>
                                <td>{{ $schedule->start_time ?? 'N/A' }}</td>
                                <td>{{ $schedule->end_time ?? 'N/A' }}</td>
                                <td>{{ $schedule->room_number }}</td>
                            </tr>
                        </tbody>
                    </table>
                @else
                    <p>No schedule available for this course.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
{{-- // Note: This is a partial version of the original project.
// Some parts of the source code have been removed for privacy/security reasons. --}}

