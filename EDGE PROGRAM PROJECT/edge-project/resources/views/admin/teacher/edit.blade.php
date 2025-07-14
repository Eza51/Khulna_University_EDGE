@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Teacher</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Teacher</li>
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
                            <h3 class="card-title">Update Teacher</h3>
                        </div>
                        <form action="{{ route('teacher.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="teacherName">Teacher Name</label>
                                    <input type="text" name="name" class="form-control" id="teacherName" value="{{ old('name', $teacher->name) }}" placeholder="Enter teacher name">
                                </div>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-group">
                                    <label for="mobile">Mobile Number</label>
                                    <input type="text" name="mobile" class="form-control" id="mobile" value="{{ old('mobile', $teacher->mobile) }}" placeholder="Enter mobile number">
                                </div>
                                @error('mobile')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $teacher->email) }}" placeholder="Enter email address">
                                </div>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-group">
                                    <label for="teacherType">Teacher Type</label>
                                    <select name="teacher_type_id" class="form-control" id="teacherType">
                                        @foreach($teacherTypes as $type)
                                            <option value="{{ $type->id }}" {{ $teacher->teacher_type_id == $type->id ? 'selected' : '' }}>
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('teacher_type_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-group">
                                    <label for="universityName">Select University</label>
                                    <select name="university_id" class="form-control" id="universityName">
                                        @foreach($universities as $university)
                                            <option value="{{ $university->id }}" {{ $teacher->university_id == $university->id ? 'selected' : '' }}>
                                                {{ $university->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('university_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-group">
                                    <label for="profilePicture">Profile Picture</label>
                                    <input type="file" name="profile_picture" class="form-control" id="profilePicture">
                                    @if($teacher->profile_picture)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $teacher->profile_picture) }}" width="100" height="100" alt="Profile Picture">
                                        </div>
                                    @endif
                                </div>
                                @error('profile_picture')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Teacher</button>
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
