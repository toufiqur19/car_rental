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
          <h5 class="text-light fw-normal">Rentals</h5>
      </div>
    </div> 

    <div class="d-flex gap-3">
        <button onclick="allRentals()" id="all" class="my-4 btn btn-outline-danger btn-sm active">Rentals</button>
        <button onclick="rentalBooking()" id="rental" class="my-4 btn btn-outline-danger btn-sm">All Booking</button>
    </div>
    <div id="all-rentals">
        <h4 class="mb-3">All Rentals</h4>
    </div>

    <div id="rentals_booking" class="d-none">
      <h4 class="mb-3 rentals-title mt-4">Current Booking</h4>
      <div class="table-responsive overflow">
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
      </div>

      <h4 class="mb-3 mt-5 rentals-title">Past Booking</h4>
      <div class="table-responsive overflow">
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
      </div>
    </div>
    
@endsection

<script>

  function rentalBooking(){
    document.getElementById('all-rentals').classList.add('d-none');
    document.getElementById('rentals_booking').classList.remove('d-none');
    document.getElementById('rental').style.background = '#da1c36';
    document.getElementById('rental').style.color = '#fff';
    document.getElementById('all').style.background = 'none';
    document.getElementById('all').style.color = '#111';
  }

  function allRentals(){
    document.getElementById('all-rentals').classList.remove('d-none');
    document.getElementById('rentals_booking').classList.add('d-none');
    document.getElementById('all').style.background = '#da1c36';
    document.getElementById('all').style.color = '#fff';
    document.getElementById('rental').style.background = 'none';
    document.getElementById('rental').style.color = '#111';
  }
</script>