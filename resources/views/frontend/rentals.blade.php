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
      <div class="banner-text d-flex">
          <h5 class="text-light fw-normal">Rentals Booking</h5>
      </div>
  </div> 

    <h4 class="mb-3 rentals-title mt-4">Current Booking</h4>
    <table class="table" id="myTable">
        <thead>
          <tr>
            <th scope="col">Car</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Brand</th>
            <th scope="col">Total Cost</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($carRentals as $carRental)
            @if ($carRental->status == 0)
            <tr>
              <th scope="row">{{ $carRental->car->name }}</th>
              <th scope="row">{{ $carRental->start_date }}</th>
              <th scope="row">{{ $carRental->end_date }}</th>
              <th scope="row">{{ $carRental->car->brand }}</th>
              <th scope="row">{{ $carRental->total_cost }}</th>
              <th scope="row">
                <img src="{{ asset($carRental->car->image) }}" alt="" width="50px">
              </th>
              <th scope="row">
                <a href="{{ route('rentalComplete', $carRental->id) }}" class="btn-sm btn-success">Complete</a>

                <a href="{{ route('rentalCancel', $carRental->id) }}" class="btn-sm btn-danger">Cancel</a>
              </th>
              @endif
            @endforeach
        </tbody>
      </table>

      <h4 class="mb-3 mt-5 rentals-title">Past Booking</h4>
      <table class="table" id="myTable">
        <thead>
          <tr>
            <th scope="col">Car</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Brand</th>
            <th scope="col">Total Cost</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($carRentals as $carRental)
            @if ($carRental->status == 1 || $carRental->status == 2)
            <tr>
              <th scope="row">{{ $carRental->car->name }}</th>
              <th scope="row">{{ $carRental->start_date }}</th>
              <th scope="row">{{ $carRental->end_date }}</th>
              <th scope="row">{{ $carRental->car->brand }}</th>
              <th scope="row">{{ $carRental->total_cost }}</th>
              <th scope="row">
                <img src="{{ asset($carRental->car->image) }}" alt="" width="50px">
              </th>
              <th scope="row">
                @if ($carRental->status == 1)
                    <a href="" class="btn btn-sm btn-success">Complete</a>
                @else
                    <a href="" class="btn btn-sm btn-danger">Cancel</a>
                @endif
              </th>
              @endif
            @endforeach
        </tbody>
      </table>
    
@endsection