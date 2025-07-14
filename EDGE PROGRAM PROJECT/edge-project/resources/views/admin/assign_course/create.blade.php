@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Course</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Course</li>
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
                            <h3 class="card-title">Add Course</h3>
                        </div>
                        <form action="{{ route('assign-course.store') }}" method="POST">


                            @csrf
                            <div class="card-body">
                                <select name="class_id" class="form-control">
                                    <option disabled selected>Select Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                                 <!-- Teachers Checkbox Selection -->
    <div class="form-group">
        <label for="teachers">Select Teachers</label>
        <div class="form-check">
            @foreach ($teachers as $teacher)
                <input type="checkbox" class="form-check-input" name="teacher_ids[]" value="{{ $teacher->id }}" id="teacher_{{ $teacher->id }}">
                <label class="form-check-label" for="teacher_{{ $teacher->id }}">{{ $teacher->name }}</label><br>
            @endforeach
        </div>
    </div>
</div>
                                
                               
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary ml-2">Back to Dashboard</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
