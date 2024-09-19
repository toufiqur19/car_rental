@extends('frontend.layout.app')
<!-- Login Form -->
@section('content')
<div class="banner">
    <div class="overlay"></div>
    <img src="https://www.freewebheaders.com/wp-content/gallery/cars/porsche-911-silver-color-top-speed-car-web-header.jpg" alt="">
    <div class="banner-text d-flex">
        <h5 class="text-light fw-normal">Contact</h5>
    </div>
</div>

<div class="login-container mt-5">
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
    
    <div class="login-box">
        <h2 class="text-center fs-2">Contact Form</h2>
        <form action="{{ route('loginUser') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control p-1.5 fs-6" id="email" placeholder="Enter your email" value="{{ old('email') }}">
            </div>
            @error('email')
                <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control p-1.5 fs-6" id="password" placeholder="Enter your password" value="{{ old('password') }}">
            </div>
            @error('password')
                <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
            @enderror
            <div class="d-grid gap-2">
                <button type="submit" class="btn btnauth p-1.5 fs-6">Login</button>
            </div>
            <div class="mt-3 text-center al">
                <p>Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
