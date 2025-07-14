@extends('teacher.layouts.master')
@section('content')
    
<!-- Author: Nowshin Eza Admin Login page for the Academic Management System-->

<div class="content-wrapper">

  <div class="content-header">
  <div class="container-fluid">
    <div class="col-md-12">
      @if($announcements->isNotEmpty())
          @foreach($announcements as $announcement)
              <div class="alert alert-warning">
                  {{ $announcement->message }}
              </div>
          @endforeach
      @else
          <div class="alert alert-info">
              No announcements at the moment.
          </div>
      @endif
  </div>
  
  <div class="row mb-2">
  <div class="col-sm-6">
  <h1 class="m-0">Dashboard</h1>
  </div>
  <div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Dashboard v1</li>
  </ol>
  </div>
  </div>
  </div>
  </div>
  
  
  <section class="content">
  <div class="container-fluid">
  
  <div class="row">
  <div class="col-lg-3 col-6">
  
  <div class="small-box bg-info">
  <div class="inner">
  <h3>150</h3>
  <p>New Orders</p>
  </div>
  <div class="icon">
  <i class="ion ion-bag"></i>
  </div>
  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
  </div>
  
  <div class="col-lg-3 col-6">
  
  <div class="small-box bg-success">
  <div class="inner">
  <h3>53<sup style="font-size: 20px">%</sup></h3>
  <p>Bounce Rate</p>
  </div>
  <div class="icon">
  <i class="ion ion-stats-bars"></i>
  </div>
  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
  </div>
  
  <div class="col-lg-3 col-6">
  
  <div class="small-box bg-warning">
  <div class="inner">
  <h3>44</h3>
  <p>User Registrations</p>
  </div>
  <div class="icon">
  <i class="ion ion-person-add"></i>
  </div>
  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
  </div>
  
  <div class="col-lg-3 col-6">
  
  <div class="small-box bg-danger">
  <div class="inner">
  <h3>65</h3>
  <p>Unique Visitors</p>
  </div>
  <div class="icon">
  <i class="ion ion-pie-graph"></i>
  </div>
  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
  </div>
  
  </div>
  
  <!-- Author: Nowshin Eza Admin Login page for the Academic Management System-->
  
  @endsection