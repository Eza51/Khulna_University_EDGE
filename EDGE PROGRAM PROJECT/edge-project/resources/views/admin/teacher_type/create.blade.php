@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Teacher Type</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Teacher Type</li>
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
                            <h3 class="card-title">Add Teacher Type</h3>
                        </div>
                        <form action="{{ route('teacherTypes.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="teacherTypeName">Teacher Type Name</label>
                                    <input type="text" name="name" class="form-control" id="teacherTypeName" placeholder="Enter teacher type name">
                                </div>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('teacherTypes.index') }}" class="btn btn-secondary ml-2">Back to Teacher Types List</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
