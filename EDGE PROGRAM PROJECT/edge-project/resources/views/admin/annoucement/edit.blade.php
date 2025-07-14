@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Announcement</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('announcement.index') }}">Announcements</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Edit Announcement</h3>
                        </div>

                        <form action="{{ route('announcement.update', $announcement->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <input type="text" name="message" class="form-control" id="message" value="{{ old('message', $announcement->message) }}">
                                </div>
                                @error('message')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type" class="form-control" id="type">
                                        <option value="Teacher" {{ old('type', $announcement->type) == 'Teacher' ? 'selected' : '' }}>Teacher</option>
                                        <option value="Student" {{ old('type', $announcement->type) == 'Student' ? 'selected' : '' }}>Student</option>
                                    </select>
                                </div>
                                @error('type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
