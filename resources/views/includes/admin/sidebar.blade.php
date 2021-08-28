<!-- Sidebar --> 
<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin-dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">minim Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $active == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin-dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @foreach ($menus as $menu)

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ $menu->menu }}
    </div>

        @foreach ($menu->sub_menus as $sub_menu)

        @if ($sub_menu->is_active == 1)
        <!-- Nav Item  -->
        <li class="nav-item {{ $active == $sub_menu->title ? 'active' : '' }}">
            <a class="nav-link pb-0" href="{{ route($sub_menu->url) }}">
                <i class="{{ $sub_menu->icon }}"></i>
                <span>{{ $sub_menu->title }}</span></a>
        </li>
        @endif

        @endforeach

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    @endforeach

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