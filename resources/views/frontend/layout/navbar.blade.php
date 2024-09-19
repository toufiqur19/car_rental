<!-- navbar section strat -->
<header>
    <a href="#" class="logo"><i class="fas fa-car"></i></i>RentMyRide</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a class="{{ Request::is('/')?'active':'' }}" href="{{ url('/') }}">Home</a>
        <a href="#">About</a>
        <a class="{{ Request::is('car-rentals')?'active':'' }}" href="{{ route('carsRentals') }}">Rentals</a>
        <a class="{{ Request::is('contact')?'active':'' }}" href="{{ route('contact')}}">Contact</a>
        @guest
        <a class="{{ Request::is('login')?'active':'' }}" href="{{ route('login') }}">Login</a>
        <a class="{{ Request::is('register')?'active':'' }}" href="{{ route('register') }}">Singup</a>
        @endguest
        
        @auth
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu mt-2 bg-light dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="{{ route('logout')}}">Log Out</a>
            </div>
        </div>
        @endauth
    </nav>
  </header>
  <!-- navbar section end -->

  <script>
    let menu = document.querySelector('#menu-bar');
    let navbar = document.querySelector('.navbar');

    menu.onclick = () =>{
        
        menu.classList.toggle('fa-times');
        navbar.classList.toggle('active');
    }

    window.onscroll = () =>{
        
        menu.classList.remove('fa-times');
        navbar.classList.remove('active');
    }

    function profile(){
      document.querySelector('.profile').classList.toggle('d-none');
    }
  </script>