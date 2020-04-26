<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('welcome') }}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fab fa-forumbee"></i>
      </div>
      <div class="sidebar-brand-text mx-3">AsBeez</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="index.html"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Company Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Company</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="{{ route('about') }}">About Us</a>
            <a class="collapse-item" href="{{ route('contact') }}">Contact Us</a>
            <a class="collapse-item" href="{{ route('register') }}">Register</a>
            <a class="collapse-item" href="{{ route('login') }}">Login</a>
            <a class="collapse-item" href="{{ route('logout') }}">Logout</a>
            <a class="collapse-item" href="{{ route('admin.index') }}">Admin</a>
            <a class="collapse-item" href="{{ route('questions.index') }}">Questions</a>
          </div>
        </div>
      </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
