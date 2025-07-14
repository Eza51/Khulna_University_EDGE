@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Students</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Create Students</li>
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
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
            @endif
            @if (session('error'))
              <div class="alert alert-danger">
                  {{ session('error') }}
              </div>
            @endif

            <div class="card-header">
              <h3 class="card-title">Add Students</h3>
            </div>

            <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                
                <!-- Student Details -->
                <div class="row">
                    <!-- Course Dropdown -->
<div class="form-group col-md-4">
    <label>Select Course</label>
    <select name="course_id" class="form-control">
        <option value="" disabled selected>Select Course</option>
        @foreach($courses as $course)
            <option value="{{ $course->id }}">{{ $course->name }}</option>
        @endforeach
    </select>
    @error('course_id')
        <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

                  <div class="form-group col-md-4">
                    <label for="name">Student Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Student Name">
                    @error('name')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group col-md-4">
                    <label for="father_name">Student's Father Name</label>
                    <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Enter Father's Name">
                    @error('father_name')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group col-md-4">
                    <label for="mother_name">Student's Mother Name</label>
                    <input type="text" name="mother_name" class="form-control" id="mother_name" placeholder="Enter Mother's Name">
                    @error('mother_name')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="mobile_number">Student's Mobile Number</label>
                    <input type="text" name="mobile_number" class="form-control" id="mobile_number" placeholder="Enter Mobile Number">
                    @error('mobile_number')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group col-md-4">
                    <label for="dob">Student's DOB</label>
                    <input type="date" name="dob" class="form-control" id="dob">
                    @error('dob')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                    @error('email')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                    @error('password')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="form-group col-md-4">
                    <label for="profile_picture">Profile Picture</label>
                    <input type="file" name="profile_picture" class="form-control" id="profile_picture" accept="image/*">
                    @error('profile_picture')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Student</button>
                <a href="{{ route('student.read') }}" class="btn btn-secondary ml-2">Back to Student List</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
@endsection

@section('customJs')
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endsection
