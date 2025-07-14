<!DOCTYPE html>
<html lang="en">

<!-- Author: Nowshin Eza Admin Login page for the Academic Management System-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Student Dashboard</title>
<base href="{{ asset('admincss') }}/" />

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">

<link rel="stylesheet" href="dist/css/adminlte.min2167.css?v=3.2.0">

<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

@yield('customCss')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<div class="preloader flex-column justify-content-center align-items-center">
<img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
<li class="nav-item d-none d-sm-inline-block">
    <a href="{{ url('/') }}" class="nav-link">
      <i class="fas fa-home"></i> Home
    </a>
</li>
<!-- Add a new Dashboard link -->
<li class="nav-item d-none d-sm-inline-block">
  <a href="{{ route('student.dashboard') }}" class="nav-link">
      <i class="fas fa-tachometer-alt"></i> Dashboard
  </a>
</li>
</ul>

<ul class="navbar-nav ml-auto">

<!-- Logout Dropdown -->
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-user"></i> Profile
  </a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
  <a href="{{ url('student/student/logout') }}" class="dropdown-item">
      <i class="fas fa-sign-out-alt mr-2"></i> Logout
  </a>
</div>
</li>
</ul>

</nav>


<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="{{ route('student.dashboard') }}" class="brand-link">
  <div style="display: flex; justify-content: center; align-items: center;">
    <img src="dist/img/AdminLTELogo.png" alt="Logo" class="">
  </div>
  
<br>
<span class="brand-text font-weight-light" style="margin-top: -30px; display: block; font-size: 24px; font-weight: bold; text-align:center"><b>Student Dashboard</b></span>
</a>

<div class="sidebar">
@include('student.nav')
</div>

</aside>

<aside class="control-sidebar control-sidebar-dark">
</aside>

@yield('content')

</div>



<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/sparklines/sparkline.js"></script>
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte2167.js?v=3.2.0"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard.js"></script>

@yield('customJs')
</body>

<!-- Author: Nowshin Eza Admin Login page for the Academic Management System-->
</html>
