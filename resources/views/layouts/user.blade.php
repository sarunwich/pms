<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }} | @section('page_now') @show</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  {{-- <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script> --}}
  <!-- Fonts -->
  {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
  @stack('style')
  @include('sweetalert::alert')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
     

     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->prefix }}{{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home" class="brand-link">
      {{-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

      <!-- SidebarSearch Form -->
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

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- <li class="nav-item {{ in_array(Route::currentRouteName(), ['Register.internship', 'Internship.Registration.Results']) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['Register.internship', 'Internship.Registration.Results']) ? 'active' : '' }}"">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                ลงทะเบียน
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('Register.internship') }}" class="nav-link {{ Route::currentRouteName() == 'Register.internship' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ลงทะเบียนฝึกงาน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Internship.Registration.Results') }}" class="nav-link {{ Route::currentRouteName() == 'Internship.Registration.Results' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>สถานะลงทะเบียนฝึกงาน</p>
                </a>
              </li>
              
            </ul>
          </li> --}}
          <li class="nav-item {{ in_array(Route::currentRouteName(), ['Internship.form', 'Internship.status']) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['Internship.form', 'Internship.status']) ? 'active' : '' }}"">
              <i class="nav-icon far fa-file"></i>
              <p>
                ขอฝึกงาน
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('Internship.form') }}" class="nav-link {{ Route::currentRouteName() == 'Internship.form' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>บันทึกข้อมูลขอฝึกงาน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Internship.status') }}" class="nav-link {{ Route::currentRouteName() == 'Internship.status' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>สถานะขอฝึกงาน</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item {{ in_array(Route::currentRouteName(), ['Internship.report', 'Internship.information','Internship.edit','Internship.print']) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['Internship.report', 'Internship.information','Internship.edit','Internship.print']) ? 'active' : '' }}"">
              <i class="nav-icon far fa-file"></i>
              <p>
                จัดการฝึกงาน
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('Internship.report') }}" class="nav-link {{ Route::currentRouteName() == 'Internship.report' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>รายการฝึกงาน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Internship.information') }}" class="nav-link {{ Route::currentRouteName() == 'Internship.information' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>บันทึกข้อมูลฝึกงาน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Internship.edit') }}" class="nav-link {{ Route::currentRouteName() == 'Internship.edit' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แก้ไขข้อมูลฝึกงาน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Internship.print') }}" class="nav-link {{ Route::currentRouteName() == 'Internship.print' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>พิมพ์ฝึกงาน</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link ">
                <i class="nav-icon fas fa-edit"></i>
                <p>xx
                </p>
            </a>
            <a href="" class="nav-link ">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                    เพิ่มแบบสอบถาม
                    
                </p>
            </a>
        </li>
    
          
          
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> @section('page_now') @show</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active"> @section('page_now')@show</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @yield('content')
      <!-- Default box -->
      {{-- <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          Start creating your amazing application!
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div> --}}
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 2
    </div>
    <strong>Copyright &copy; 2023 <a href="https://sci.tsu.ac.th/csit">SCIDI CSIT </a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
{{-- <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script> --}}
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
@stack('scripts')
</body>
</html>
