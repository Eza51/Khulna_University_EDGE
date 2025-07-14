<!DOCTYPE html>
<html lang="en">

<!-- Author: Nowshin Eza Admin Login page for the Academic Management System-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Dashboard</title>
<base href="{{ asset('admincss') }}/" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">


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
  <a href="{{ route('admin.dashboard') }}" class="nav-link">
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
    <a href="{{ route('admin.logout') }}" class="dropdown-item d-flex align-items-center">
        <i class="fas fa-sign-out-alt mr-2"></i> Logout
    </a>
</div>

</li>
</ul>

</nav>


<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="{{ route('admin.dashboard') }}" class="brand-link">
  <div style="display: flex; justify-content: center; align-items: center;">
    <img src="dist/img/AdminLTELogo.png" alt="Logo"  >
  </div>
  
<br>
<span class="brand-text font-weight-light" style="margin-top: -30px; display: block; font-size: 24px; font-weight: bold; text-align: center;"><b> KHULNA UNIVERSITY <br> EDGE SYSTEM</span>


</a>

<div class="sidebar">

@include('admin.dashboard.nav')

{{-- <div class="form-inline">
<div class="input-group" data-widget="sidebar-search">
<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-sidebar">
<i class="fas fa-search fa-fw"></i>
</button>
</div>
</div>
</div> --}}


</div>

</aside>

@yield('content')





<aside class="control-sidebar control-sidebar-dark">

</aside>

{{-- 
</div>
<footer class="main-footer" style="position: fixed; bottom: 0; left: 0; right: 0; width: 100%;  align-items: center; background-color: #fff; color: #343a40; ">
  <div style="text-align: left">
    <strong>Copyright &copy; 2024 <a href="" style="color: #343a40;">Nowshin Jerin Eza</a></strong> 
  
    <b style=" text-align: center;" >Version</b> 1.2.0

</div> --}}
 
</footer>







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
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>


@yield('customJs')
</body>

<!-- Author: Nowshin Eza Admin Login page for the Academic Management System-->
</html>
