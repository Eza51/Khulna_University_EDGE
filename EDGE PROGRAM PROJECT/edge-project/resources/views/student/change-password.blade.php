@extends('student.layouts.master')
@section('content')
<!-- Author: Nowshin Eza - Admin Login page for the Academic Management System -->
<div class="content-wrapper">

  <!-- Page Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Student Password Change</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Student Password Change</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Main Content -->
  {{--  // Note: This is a partial version of the original project.
// Some parts of the source code have been removed for privacy/security reasons.
--}}

@section('customJs')
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
  $(function () {
    bsCustomFileInput.init();
  });
</script>
@endsection
