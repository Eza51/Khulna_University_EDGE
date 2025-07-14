@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Teacher</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Teacher</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <div class="card-header">
                            <h3 class="card-title">Add Teacher</h3>
                        </div>
                        <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <!-- Teacher Name -->
                                <div class="form-group">
                                    <label for="teacherName">Teacher Name</label>
                                    <input type="text" name="name" class="form-control" id="teacherName" placeholder="Enter teacher name" value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <!-- Mobile Number -->
                                <div class="form-group">
                                    <label for="teacherMobile">Mobile Number</label>
                                    <input type="text" name="mobile" class="form-control" id="teacherMobile" placeholder="Enter mobile number" value="{{ old('mobile') }}">
                                </div>
                                @error('mobile')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="teacherEmail">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="teacherEmail" placeholder="Enter email address" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="teacherPassword">Password</label>
                                    <input type="password" name="password" class="form-control" id="teacherPassword" placeholder="Enter password">
                                </div>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <!-- Profile Picture -->
                                <div class="form-group">
                                    <label for="teacherProfilePicture">Profile Picture</label>
                                    <input type="file" name="profile_picture" class="form-control-file" id="teacherProfilePicture">
                                </div>
                                @error('profile_picture')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <!-- Teacher Type -->
                                <div class="form-group">
                                    <label for="teacherType">Teacher Type</label>
                                    <select name="teacher_type_id" id="teacherType" class="form-control">
                                        <option value="" disabled selected>Select Teacher Type</option>
                                        @foreach ($teacherTypes as $teacherType)
                                            <option value="{{ $teacherType->id }}" {{ old('teacher_type_id') == $teacherType->id ? 'selected' : '' }}>
                                                {{ $teacherType->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('teacher_type_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <!-- University -->
                                <div class="form-group">
                                    <label for="university">University</label>
                                    <select name="university_id" id="university" class="form-control">
                                        <option value="" disabled selected>Select University</option>
                                        @foreach ($universities as $university)
                                            <option value="{{ $university->id }}" {{ old('university_id') == $university->id ? 'selected' : '' }}>
                                                {{ $university->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('university_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
        
                            <label for="courses">Select Courses:</label>
                            @foreach($courses as $course)
                                <div>
                                    <input type="checkbox" name="courses[]" value="{{ $course->id }}">
                                    <label>{{ $course->name }}</label>
                                </div>
                            @endforeach
                            

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('teacher.index') }}" class="btn btn-secondary ml-2">Back to Teacher List</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
