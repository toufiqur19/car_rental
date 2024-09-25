@extends('frontend.layout.app')
<!-- Login Form -->
@section('content')
<div class="banner">
    <div class="overlay"></div>
    <img src="https://www.freewebheaders.com/wp-content/gallery/cars/porsche-911-silver-color-top-speed-car-web-header.jpg" alt="">
    <div class="banner-text about d-flex">
        <h5 class="text-light fw-normal">The Future of
            Car Rental is Here</h5>
    </div>
</div>

<div class="contract-container mt-5 mx-5">
    @session('success')
    <script>
        successToast("{{ session('success') }}");
    </script>
    @endsession

    @session('error')
    <script>
        errorToast("{{ session('error') }}");
    </script>
    @endsession
    
    <div class="row">
        <div class="text-center mb-3">
            <h4 class="about-title">About Us</h4>
            <p>Your Comfort and Safety Are Our Top Priorities</p>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('/img/about.png') }}" alt="" style="width: 100%; height: auto;border-radius: 10px">
        </div>
        <div class="col-md-6 about-text">
            <p>Welcome to Carento, your trusted partner in car rentals. Since our founding, we have been committed to providing our customers with a seamless and reliable car rental experience. Whether you're planning a business trip, a family vacation, or just need a vehicle for everyday use, we offer a wide range of vehicles to meet your needs.
            </p>
        </div>
    </div>
    
</div>
@endsection
