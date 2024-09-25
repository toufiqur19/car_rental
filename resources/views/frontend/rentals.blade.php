@extends('frontend.layout.app')

@section('content')
    @session('success')
        <script>
            successToast("{{ session('success') }}");
        </script>
    @endsession

    <div class="banner">
        <div class="overlay"></div>
        <img src="https://www.freewebheaders.com/wp-content/gallery/cars/porsche-911-silver-color-top-speed-car-web-header.jpg" alt="">
    </div>
    <div class="search">
        <form action="">
            <div class="row text-light fw-light search_input">
                <div class="col-lg-4 col-md-4 search_item">
                    <label class="form-label" for="car_type">Car Type</label>
                    <select class="form-select" id="car_type" name="car_type" onchange="this.form.submit()">
                    <option value="">Select Car Type</option>
                    @foreach ($rentals as $rental)
                    <option value="{{ $rental->car_type }}">{{ $rental->car_type }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-3 search_item">
                    <label class="form-label" for="brand">Brand</label>
                    <select class="form-select brand" id="brand" name="brand" onchange="this.form.submit()">
                        <option value="">Select Brand</option>
                        @foreach ($rentals as $rental)
                        //unique value
                        <option value="{{ $rental->brand }}">{{ $rental->brand }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-5 col-md-5 search_item">
                    <label class="form-label">daily rent price</label>
                    <div class="d-flex gap-2">
                        <input class="form-control" id="search" name="search" type="search" value="" placeholder="Search" aria-label="Search">
                        <button class="btn2 btn-outline-primary btn-sm" type="submit">Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
   
    <div class="">
        <h4 class="my-4"style="color: #da1c36;">Available All Cars</h4>
        <div class="row d-flex ">
            @foreach ($rentals as $rental)
            @if ($rental->availability == 1)
            <div class="col-sm-4 mb-4">
                <div class="card">
                    <img src="{{ asset($rental->image) }}" class="card-img-top" alt="..." style="width: 100%; height: 150px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $rental->name }}</h5><hr>
                        <div class="d-flex justify-content-between">
                            <p class="card-text1">${{ $rental->daily_rent_price }}<span class="text-muted">/day</span></p>
                            <span class="card-text">Year: {{ $rental->year }}</span>
                        </div>
                      <div class="">
                          <span>Brand: {{ $rental->brand }}</span><br>
                          <span class="card-text">Car-Type:{{ $rental->car_type }}</span>
                          <p class="card-text">Model: {{ $rental->model }}</p>
                      </div>
                      <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('carDetails', $rental->id) }}" class="btn1 btn btn-sm btn-primary">View Details</a>
                      </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
@endsection
