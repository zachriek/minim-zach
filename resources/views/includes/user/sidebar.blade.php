<!-- Sidebar --> 
<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('profile-user-index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">minim User</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider mt-0">

    <!-- Heading -->
    <div class="sidebar-heading">
        Profile
    </div>

    <!-- Nav Item  -->
    <li class="nav-item {{ $active == 'My Profile' ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('profile-user-index') }}">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>My Profie</span></a>
    </li>

    <!-- Nav Item  -->
    <li class="nav-item {{ $active == 'Change Password' ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('change-user-password') }}">
            <i class="fas fa-fw fa-key"></i>
            <span>Change Password</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Back to Home -->
    <li class="nav-item mt-2">
        <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-fw fa-home"></i>
        <span>Back to Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar