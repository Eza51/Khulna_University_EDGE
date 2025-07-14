@extends('admin.layouts.master')

@section('content')
<!-- Author: Nowshin Eza Admin Teacher Update page -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Teachers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Teachers</li>
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
                            <h3 class="card-title">Update Teacher</h3>
                        </div>
                        <form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <input type="hidden" name="id" value="{{ $teacher->id }}"/>

                                <div class="form-group">
                                    <label for="teacherName">Teacher Name</label>
                                    <input type="text" name="name" class="form-control" id="teacherName" placeholder="Enter teacher name" value="{{ old('name', $teacher->name) }}">
                                </div>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-group">
                                    <label for="universityName">Select University</label>
                                    <select name="university_id" class="form-control" id="universityName">
                                        @foreach($universities as $university)
                                            <option value="{{ $university->id }}" {{ old('university_id', $teacher->university_id) == $university->id ? 'selected' : '' }}>
                                                {{ $university->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('university_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Teacher</button>
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
