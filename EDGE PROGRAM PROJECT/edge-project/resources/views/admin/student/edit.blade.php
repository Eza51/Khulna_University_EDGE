@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Student</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Student</h3>
                        </div>
                        <div class="card-body">
                            <!-- Success and Error Messages -->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group">
                                    <label for="name">Student Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="father_name">Father's Name</label>
                                    <input type="text" class="form-control" id="father_name" name="father_name" value="{{ $student->father_name }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="mother_name">Mother's Name</label>
                                    <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ $student->mother_name }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="mobile_number">Mobile Number</label>
                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ $student->mobile_number }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob" value="{{ $student->dob }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="course_id">Course</label>
                                    <select class="form-control" id="course_id" name="course_id" required>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}>
                                                {{ $course->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="profile_picture">Profile Picture</label>
                                    <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                                    @if ($student->profile_picture)
                                        <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="Profile Picture" width="50" height="50" class="img-thumbnail mt-2">
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-success">Update Student</button>

                                <a href="{{ route('student.read') }}" class="btn btn-secondary ml-2">Back to Student List</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
