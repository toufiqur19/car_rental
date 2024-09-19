@extends('frontend.layout.app')
<!-- Login Form -->
@section('content')
<div class="login-container">
    @session('success')
        <p class="text-success">{{ session('success') }}</p>
    @endsession
    <div class="login-box" style="width: 25rem">
        <h2 class="text-center fs-2">Registration</h2>
        <form action="{{ route('registerUser')}}" method="POST">
            @csrf
            <div class="">
                <label for="name" class="form-label">Name</label>
                <input type="name" name="name" class="form-control" id="name" placeholder="Enter your name" value="{{ old('name') }}">
            </div>
            @error('name')
                <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
            @enderror
            <div class="">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}">
            </div>
            @error('email')
                <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
            @enderror
            <div class="">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control" placeholder="Enter your phone" value="{{ old('phone') }}">
            </div>
            @error('phone')
                <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
            @enderror
            <div class="">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter your address" value="{{ old('address') }}">
            </div>
            @error('address')
                <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
            @enderror
            <div class="">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" value="{{ old('password') }}">
            </div>
            @error('password')
                <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
            @enderror
            <div class="">
                <label for="password" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="cpassword" placeholder="Enter your confirm password" value="{{ old('password_confirmation') }}">
            </div>
            @error('password_confirmation')
                <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
            @enderror
            <div class="d-grid gap-2">
                <button type="submit" class="btn btnauth p-1.5">Sign up</button>
            </div>
            <div class="mt-3 text-center al">
                <p>alrady have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>
    </div>
</div>
@endsection