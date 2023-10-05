<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Arduino Chart</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset("/assets/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("/assets/dist/css/adminlte.min.css")}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/chart" class="nav-link">Home</a>
      </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Sensor 1</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
          <li><a href="{{ url('/chart/ph') }}" class="dropdown-item">pH</a></li>
          <li li><a href="{{ url('/chart/humidity') }}" class="dropdown-item">Humidity</a></li>
          <li><a href="{{ url('/chart/electrical_conductivity') }}" class="dropdown-item">Electrical Conductivity</a></li>
          <li><a href="{{ url('/chart/luminosity') }}" class="dropdown-item">Luminosity</a></li>
          </ul>
          </li>
      </ul>
        
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset("/assets/dist/img/AdminLTELogo.png") }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Arduino Chart</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset("/assets/dist/img/my pic.jpg") }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Bima Bayu Saputra</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url("/chart") }}" class="nav-link {{ (app('request')->route()->uri() == "chart") ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chart</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url("/chart2") }}" class="nav-link {{ (app('request')->route()->uri() == "chart2") ? "active" : ""}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chart 2</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset("/assets/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset("/assets/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("/assets/dist/js/adminlte.min.js")}}"></script>
</html>
