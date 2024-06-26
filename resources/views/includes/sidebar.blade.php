<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('dashboard')}}" class="brand-link mt-3 pb-3 mb-3">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">KYENI HMS</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!-- <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./index.html" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
              </a>
            </li>
          </ul>
        </li> -->

        <!-- <li class="nav-header">EXAMPLES</li> -->
        <li class="nav-item">
          <a href="{{route('dashboard')}}" class="nav-link {{request()->routeIs('dashboard*') ? 'active' : ''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <!-- <span class="badge badge-info right">2</span> -->
            </p>
          </a>
        </li>
        @can('view role')

        <li class="nav-item">
          <a href="{{route('roles.index')}} " class="nav-link {{request()->routeIs('roles*') ? 'active' : ''}}">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              System Roles
              <!-- <span class="badge badge-info right">2</span> -->
            </p>
          </a>
        </li>

        @endcan

        <li class="nav-item">
          <a href="{{route('user.index')}}" class="nav-link {{request()->routeIs('user*') ? 'active' : ''}}">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Manage Users
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('bioData.index')}}" class="nav-link {{request()->routeIs('bioData*') ? 'active' : ''}}">
            <i class="nav-icon fa fa-database"></i>
            <p>
              Manage Bio Data
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ 'logout' }}" class="nav-link" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            @csrf
            <i class="fa fa-power-off nav-icon"></i>
            <p>
              System Logout
            </p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>