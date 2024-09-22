@extends('admin.layout.app')

@section('content')
    @session('success')
        <script>
            successToast("{{ session('success') }}");
        </script>
        @endsession
        
    <div class="content car">
        <div class="carContent px-4 py-4">
            <div class="d-flex justify-content-between">
                <h4>Customer View</h4>
                <a href="{{ route('customerView') }}" class="btn btn1 btn-primary">Back</a>
            </div><hr>
            <div class="view-body mt-3">
                <h6>Customer Id: <span>{{ $customersDetails->id }}</span></h6>
                <h6>Customer Name: <span>{{ $customersDetails->name }}</span></h6>
                <h6>Customer Email: <span>{{ $customersDetails->email }}</span></h6>
                <h6>Customer Phone: <span>{{ $customersDetails->phone }}</span></h6>
                <h6>Customer Address: <span>{{ $customersDetails->address }}</span></h6>
                {{-- <h6>Car Id: <span>{{ $customersDetails->rentals->car_id }}</span></h6>
                <h6>Start Date: <span>{{ $customersDetails->rentals->start_date }}</span></h6>
                <h6>End Date: <span>{{ $customersDetails->rentals->end_date }}</span></h6>
                <h6>Total Cost: <span>{{ $customersDetails->rentals->total_cost }}</span></h6> --}}
            </div>
        </div>
    </div>
@endsection