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
    
    <div class="row gap-3">
        <h2 class="text-center fs-2 mb-3">Contact Form</h2>
        <div class="col-md-5 contact-info">
            <div class="text-center">
                <div class="mb-3">
                    <h6>Email</h6>
                    <span>admin"gmail.com</span>
                </div>
                <div class="mb-3">
                    <h6>Phone</h6>
                    <span>0123456789</span>
                </div>
                <div class="mb-3">
                    <h6>Address</h6>
                    <span>Sirajganj, Bangladesh</span>
                </div>
                <div class="mb-3">
                    <h6>Opening Hours</h6>
                    <span>24/7</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 contact">
            <div class="">
                <form action="{{ route('contact.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control p-1.5" id="name" placeholder="Enter your name" value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control p-1.5" id="email" placeholder="Enter your email" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control p-1.5" id="phone" placeholder="Enter your phone" value="{{ old('phone') }}">
                    </div>
                    @error('phone')
                        <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                    @enderror
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" class="form-control p-1.5" id="message" placeholder="Enter your message">{{ old('message') }}</textarea>
                    </div>
                    @error('message')
                        <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                    @enderror
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btnauth p-1.5 fs-6">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
