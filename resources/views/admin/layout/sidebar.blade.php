<!-- Sidebar Start -->
<div class="container-xxl position-relative bg-white d-flex p-0">
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
    
            <div class="navbar-nav admin w-100">
                <a href="{{ route('dashboard') }}" class="nav-item nav-link {{ Request::is('dashboard')?'active':'' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="{{ route('carView')}}" class="nav-item nav-link {{ Request::is('car')?'active':'' }}"><i class="fas fa-car me-2"></i>Cars</a>
                <a href="{{ route('rentalView')}}" class="nav-item nav-link {{ Request::is('rental')?'active':'' }}"><i class="fas fa-map-signs me-2"></i>Rentals</a>
                <a href="{{ route('customerView')}}" class="nav-item nav-link {{ Request::is('customer')? 'active':'' }}"><i class="fas fa-users me-2"></i>Customer</a>
            </div>
        </nav>
    </div>
</div>
<!-- Sidebar End -->


