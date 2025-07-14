@extends('admin.layouts.master')
@section('content')
<!-- Author: Nowshin Eza Admin University Update page for the Academic Management System-->
<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>All Universities</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">University</li>
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
              <h3 class="card-title">Update University</h3>
            </div>
            <!-- Author: Nowshin Eza Admin University Update page for the Academic Management System -->

            <form action="{{ route('university.update', $university->id) }}" method="POST">
              @csrf
              @method('PUT') <!-- This will spoof the HTTP method to PUT -->

              <div class="card-body"> 
                <input type="hidden" name="id" value="{{ $university->id }}"/>
                
                <div class="form-group">
                  <label for="universityName">Update University Name</label>
                  <input type="text" name="name" class="form-control" id="universityName" placeholder="Enter university name" value="{{ old('name', $university->name) }}">
                </div>
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="form-group">
                  <label for="universityAddress">Update Address</label>
                  <input type="text" name="address" class="form-control" id="universityAddress" placeholder="Enter address" value="{{ old('address', $university->address) }}">
                </div>
                @error('address')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="form-group">
                  <label for="universityEmail">Update Email</label>
                  <input type="email" name="email" class="form-control" id="universityEmail" placeholder="Enter email" value="{{ old('email', $university->email) }}">
                </div>
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="form-group">
                  <label for="universityPhone">Update Phone Number</label>
                  <input type="text" name="phone" class="form-control" id="universityPhone" placeholder="Enter phone number" value="{{ old('phone', $university->phone) }}">
                </div>
                @error('phone')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update University</button>
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
