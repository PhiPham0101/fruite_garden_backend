<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Trang chủ</a>
      </li>    
    </ul>

    {{-- <a href="{{ route('logout') }}" class="nav-item d-none d-sm-inline-block">
        Đăng xuất
    </a>         --}}
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.sidebar')

  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @include('admin.alert')
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
              </div>
                @yield('content')

            </div>


        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>


</div>

    @include('admin.footer')

</body>
</html>
