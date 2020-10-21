<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Fresh-Shop</title>

  <link rel="stylesheet" href="/css/app.css">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../backend/plugins/fontawesome-free/css/all.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../../backend/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Latest Resources CSS -->
  <link rel="stylesheet" href="../../backend/custom/style.css">


</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <div class="header-section">
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link icon-menu" data-widget="pushmenu" href="#" role="button">
        	<i class="fas fa-bars more"></i>
        	<i class="fas fa-align-left less"></i>        	
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost:8000/admin/dashboard" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../backend/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../backend/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../backend/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  </div>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 update-background-color">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../backend/dist/img/logo/logo.png" alt="FreshShop" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Fresh-Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../backend/dist/img/logo/profile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Najmun Nafiz</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <router-link to="/admin/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt pink"></i>
              <p>
                Home
              </p>
            </router-link>
          </li>   
          <li class="nav-item">
            <router-link to="/admin/category" class="nav-link">
              <i class="nav-icon fas fa-list teal"></i>
              <p>
                Category
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/admin/categoryProduct" class="nav-link">
              <i class="nav-icon fas fa-align-left red"></i>
              <p>
                Category-Product
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/admin/subCategory" class="nav-link">
              <i class="nav-icon fas fa-align-right orange"></i>
              <p>
                Sub-Category
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/admin/slider" class="nav-link">
              <i class="nav-icon fas fa-photo-video cyan"></i>
              <p>
                Sliders
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/admin/product" class="nav-link">
              <i class="nav-icon fab fa-product-hunt blue"></i>
              <p>
                Products
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/admin/blog" class="nav-link">
              <i class="nav-icon fas fa-book-reader yellow"></i>
              <p>
                Blogs
              </p>
            </router-link>
          </li>       
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus-square blue"></i>
              <p>
                About-Section
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <router-link to="/admin/aboutUs" class="nav-link">
                  <i class="fas fa-lg fa-building nav-icon"></i>
                  <p>About-Us</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/admin/seller" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Seller</p>
                </router-link>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <router-link to="/admin/contactUs" class="nav-link">
              <i class="nav-icon fas fa-phone-square green"></i>
              <p>
                Contact Us
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/admin/message" class="nav-link">
              <i class="nav-icon fas fa-envelope yellow"></i>
              <p>
                Message
              </p>
            </router-link>
          </li>
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus-square orange"></i>
              <p>
                Footer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <router-link to="/admin/officeTime" class="nav-link">
                  <i class="far fa-clock nav-icon"></i>
                  <p>Office Time</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/admin/subscriber" class="nav-link">
                  <i class="far fa-envelope nav-icon"></i>
                  <p>Newsletter</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/admin/socialMedia" class="nav-link">
                  <i class="far fa-comment nav-icon"></i>
                  <p>Social Media</p>
                </router-link>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th purple"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item" id="bac_change">
            <a class="nav-link" href="{{ route('admin.logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt red"></i>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

	   <router-view/>
      
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <div class="text-center">
    	<strong>Copyright &copy; 2020 <a href="http://localhost:8000/admin/dashboard">Fresh-Shop</a>. Made By <a href="http://localhost:8000/admin/dashboard">Najmun-Nafiz</a>.</strong>
    </div>
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../../backend/plugins/chart.js/Chart.min.js"></script>
<script src="../../backend/dist/js/pages/chartl.js"></script>

<!-- AdminLTE App -->
<script src="../../backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../backend/dist/js/demo.js"></script>

<!-- App JS -->
<script src="../../js/app.js"></script>

<!-- Custom JS -->
<script src="../../backend/custom/custom.js"></script>

</body>
</html>
