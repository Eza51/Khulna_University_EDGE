<!-- Author: Nowshin Eza Admin Login page for the Khulna University EDGE Management System-->

<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      <!-- Student Dashboard -->
      <li class="nav-item">
          <a href="{{ route('teacher.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Teacher Dashboard</p>
          </a>
      </li>

      <!-- Your Profile -->
      <li class="nav-item">
        <a href="{{ route('teacher.profile') }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Your Profile</p>
        </a>
    </li>
    

      <!-- Change Password -->
      <li class="nav-item">
          <a href="{{ route('teacher.change-password') }}" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>Change Password</p>
          </a>
      </li>

  </ul>
</nav>
<!-- Author: Nowshin Eza Admin Login page for the Khulna University EDGE Management System-->
