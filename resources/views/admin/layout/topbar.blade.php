<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0" style="height: 3.5rem">
    <div class="logo mt-2">
        <a class="navbar-brand fs-4 fw-bold text-primary" href="">RentMyRide</a>
        <a href="#" class="sidebar-toggler flex-shrink-0 ">
            <i class="fas fa-stream"></i>
        </a>
    </div>
    
    
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">My Profile</a>
                <a href="{{ route('logout')}}" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>

<script>
    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
       $('.sidebar, .content').toggleClass("open");
       return false;
   });
</script>