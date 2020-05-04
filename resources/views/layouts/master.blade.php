<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Ori-CMS Dashboard</title>
    <!-- Stylesheet for master template  -->
  <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-red">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>



      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="overflow-x: hidden;">
      <!-- Brand Logo -->
      <a href="/home" class="brand-link">
        <img src="{{url('/img/ori.png')}}" alt="Ori Dashboard" class="brand-image"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Ori Meats</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-smile"></i>
                <p>
                  Manage Personnel
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/drivers" class="nav-link">
                    <i class="fas fa-car nav-icon"></i>
                    <p>Drivers</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/salesmanagers" class="nav-link">
                    <i class="fas fa-address-card nav-icon"></i>
                    <p>Sales Managers</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-dolly-flatbed"></i>
                  <p>
                    Manage Products
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/products" class="nav-link">
                      <i class="fas fa-box nav-icon"></i>
                      <p>Products</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/prices" class="nav-link">
                      <i class="fas fa-donate nav-icon"></i>
                      <p>Pricing</p>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-coins"></i>
                  <p>
                    Sales
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Orders
                </p>
              </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>
                    Sales Reports
                  </p>
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
    <div class="content-wrapper py-4 px-4">
      @include('inc.messages')
      @yield('content')
    </div>
    <!-- /.content-wrapper -->
    
  </div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
  <script src="/js/app.js"></script>

<script>
    $(document).ready(function(){
    
     fetch_customer_data();
    
     function fetch_customer_data(query = '')
     {
      $.ajax({
       url:"{{ route('prices.action') }}",
       method:'GET',
       data:{query:query},
       dataType:'json',
       success:function(data)
       {
        $('#prices_search').html(data.table_data);
        $('#total_records').text(data.total_data);
       }
      })
     }
    
     $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      fetch_customer_data(query);
     });
    });
    </script>
</body>
</html>
