@extends('admin.layout.app')

@section('content')
    @session('success')
        <script>
            successToast("{{ session('success') }}");
        </script>
        @endsession
        
    <div class="content car">
        <div class="carContent px-4 py-4">
            
            <div class="row my-5 mx-5">
                <h5 class="mb-3" style="color: #172b43;">Dashboard Statistics</h5>
                <div class="col col-lg-6 cards text-center">
                    <div class="card">
                        <div class="card-body">
                          <h6 class="card-title">Total Cars</h6>
                          <p>{{ $numberCars }}</p>
                        </div>
                      </div>
                      <div class="card my-4">
                        <div class="card-body">
                          <h6 class="card-title">Available Cars</h6>
                          <p>{{ $availableCars }}</p>
                        </div>
                      </div>
                </div>
                <div class="col col-lg-6 cards text-center">
                    <div class="card">
                        <div class="card-body">
                          <h6 class="card-title">Total Rentals</h6>
                          <p>{{ $totalRentals }}</p>
                        </div>
                      </div>
                      <div class="card mt-4">
                        <div class="card-body">
                          <h6 class="card-title">Total earnings</h6>
                          <p>{{ $totalEarning }}</p>
                        </div>
                      </div>
                </div>
            </div>

        </div>
    </div>
@endsection

