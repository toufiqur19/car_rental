@extends('frontend.layout.app')

@section('content')
    @session('success')
        <script>
            successToast("{{ session('success') }}");
        </script>
    @endsession
    @session('data')
        <script>
            errorToast("{{ session('data') }}");
        </script>
    @endsession
    <div class="banner">
        <div class="overlay"></div>
        <img src="https://www.freewebheaders.com/wp-content/gallery/cars/porsche-911-silver-color-top-speed-car-web-header.jpg" alt="">
        <div class="banner-text d-flex">
            <h5 class="text-danger">{{ $carsDetails->name }} </h5>
            <p class="text-light">/ Car Details</p>
        </div>
    </div>
    <div class="mt-4">
        <div class="row">
            <div class="col col-lg-8">
                <div class="card mb-3">
                    <img src="{{ asset($carsDetails->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $carsDetails->name }}</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>

            <div class="col col-lg-4">
                <div>
                    <h5>Book Car</h5>
                    
                    <form action="{{ route('carsBook', $carsDetails->id) }}" method="POST">
                        @csrf
                        <div class="mb-3 form-width">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" class="form-control p-1.5 fs-6" id="start_date" value="{{ old('start_date') }}">
                            @error('start_date')
                                <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 form-width">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" name="end_date" class="form-control p-1.5 fs-6" id="end_date" value="{{ old('end_date') }}">
                            @error('end_date')
                                <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                            @enderror
                        </div>
                        @if (Auth::check())
                        <button type="submit" class="btn1 btn btn-primary p-1.5">Book Car</button>
                        @else
                        <button type="submit" disabled class="btn1 btn btn-primary p-1.5">Book Car</button>
                        <p class="mt-2">Login to book car <a href="{{ route('login') }}">Login</a></p>
                        @endif
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection