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
                    @foreach ($cars as $car)
                    <option value="{{ $car->car_type }}">{{ $car->car_type }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-3 search_item">
                    <label class="form-label" for="brand">Brand</label>
                    <select class="form-select brand" id="brand" name="brand" onchange="this.form.submit()">
                        <option value="">Select Brand</option>
                        @foreach ($cars as $car)
                        //unique value
                        <option value="{{ $car->brand }}">{{ $car->brand }}</option>
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
        <h4 class="my-4"style="color: #da1c36;">Available Cars</h4>
        <div class="row d-flex ">
            @foreach ($cars as $car)
            <div class="col-sm-4 mb-4">
                <div class="card">
                    <img src="{{ asset($car->image) }}" class="card-img-top" alt="..." style="width: 100%; height: 150px">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <h5 class="card-title">{{ $car->name }}</h5>
                        <span>{{ $car->brand }}</span>
                      </div>
                      <div class="d-flex justify-content-between">
                        <a href="{{ route('carDetails', $car->id) }}" class="btn1 btn btn-sm btn-primary">View Details</a>
                      </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <a class="btn1 btn btn-sm btn-primary float-end" href="{{ route('carsRentals') }}">view more cars >></a>
@endsection
