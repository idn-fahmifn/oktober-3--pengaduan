<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Responsive Admin Dashboard Template">
  <meta name="keywords" content="admin,dashboard">
  <meta name="author" content="stacks">
  <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!-- Title -->
  <title>Inventory Management System</title>

  <!-- Styles -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
  <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/plugins/font-awesome/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/plugins/perfectscroll/perfect-scrollbar.css')}}" rel="stylesheet">
  <link href="{{asset('assets/plugins/apexcharts/apexcharts.css')}}" rel="stylesheet">


  <!-- Theme Styles -->
  <link href="{{asset('assets/css/main.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">

  <!-- datatables -->
  <link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">



</head>

<body>

  <div class="page-container min-vh-100">
    <div class="page-header">
      <nav class="navbar navbar-expand-lg d-flex justify-content-between">
        <div class="" id="navbarNav">
          <ul class="navbar-nav" id="leftNav">
            <li class="nav-item">
              <a class="nav-link" id="sidebar-toggle" href="#"><i class="fa fa-align-justify text-primary"></i></a>
            </li>
            <li class="nav-item ms-5">
              <div class="logo">
                <a class="#" href="#"><img src="https://ins.co.id/wp-content/uploads/2023/11/logo-ins.png" alt="Logo" width="100" class="img-logo"></a>
              </div>
            </li>
          </ul>
        </div>

        <div class="" id="headerNav">
          <ul class="navbar-nav">

            @guest
            @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}"><i class="text-muted" data-feather="log-in"></i></a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
              <a class="nav-link profile-dropdown text-success" href="#" id="profileDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{Auth::user()->name}}
              </a>
              <div class="dropdown-menu dropdown-menu-end profile-drop-menu" aria-labelledby="profileDropDown">
                <a class="dropdown-item" href="#"><i data-feather="user"></i>Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i data-feather="settings"></i>Settings</a>
                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i data-feather="log-out"></i>Logout</a>

                <!-- form-logout -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>

              </div>
            </li>
            @endguest

          </ul>
        </div>
      </nav>
    </div>


    <!-- area sidebar -->

    @include('layouts.menu')


    <div class="page-content min-vh-100">
      <div class="main-wrapper">

        @yield('content')

      </div>

    </div>
  </div>

  <!-- Javascripts -->
  <script src="{{asset('assets/plugins/jquery/jquery-3.4.1.min.js')}}"></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="{{asset('assets/plugins/perfectscroll/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/plugins/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/js/main.min.js')}}"></script>
  <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
  <script src="{{asset('assets/plugins/DataTables/datatables.min.js')}}"></script>
  <script src="{{asset('assets/js/pages/datatables.js')}}"></script>
</body>

</html>