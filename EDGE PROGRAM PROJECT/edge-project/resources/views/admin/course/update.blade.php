@extends('admin.layouts.master')
@section('content')
<!-- Author: Nowshin Eza Admin Course Update page for the Academic Management System-->
<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>All Courses</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Course</li>
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
              <h3 class="card-title">Update Course</h3>
            </div>
            <!-- Author: Nowshin Eza Admin Course Update page for the Academic Management System-->

            <form action="{{ route('courses.update', $course->id) }}" method="post">
              @csrf
              @method('PUT') <!-- This will spoof the HTTP method to PUT -->

              <div class="card-body"> 
                <input type="hidden" name="id" value="{{ $course->id }}"/>
                <div class="form-group">
                  <label for="exampleInputEmail1">Update Course</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter course name" value="{{ old('name', $course->name) }}">
                  {{-- Coming from the controller the value --}}
                </div>
                {{-- Validation error message --}}
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Course</button>
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
