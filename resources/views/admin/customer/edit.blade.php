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
                <h4>Customer Edit</h4>
                <a href="{{ route('customerView') }}" class="btn btn1 btn-primary">Back</a>
            </div>
            <form action="{{ route('customerUpdate', $customers->id) }}" method="POST" enctype="multipart/form-data" class="px-4 py-4" >
                @csrf
                @method('PUT')
                <div class="d-flex gap-3">
                    <div class="form-width mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" name="name" class="form-control" id="name" placeholder="Enter your name" value="{{ old('name', $customers->name) }}">
                        @error('name')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-width mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email', $customers->email) }}">
                        @error('email')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="d-flex gap-3">
                    <div class="form-width mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter your phone" value="{{ old('phone', $customers->phone) }}">
                        @error('phone')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-width mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Enter your address" value="{{ old('address', $customers->address) }}">
                        @error('address')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- <div class="d-flex gap-3">
                    <div class="form-width mb-3">
                        <label for="car_id" class="form-label">Car Id</label>
                        <input type="text" name="car_id" class="form-control" id="car_id" placeholder="Enter your car_id" value="{{ old('car_id', $customers->rentals->car_id) }}">
                        @error('car_id')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-width mb-3">
                        <label for="total_cost" class="form-label">Total Cost</label>
                        <input type="text" name="total_cost" class="form-control" id="total_cost" placeholder="Enter your total cost" value="{{ old('total_cost', $customers->rentals->total_cost) }}">
                        @error('total_cost')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                </div> --}}

                {{-- <div class="d-flex gap-3">
                    <div class="form-width mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control" id="start_date" placeholder="Enter your start_date" value="{{ old('start_date', $customers->rentals->start_date) }}">
                        @error('start_date')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-width mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="text" name="end_date" class="form-control" id="end_date" placeholder="Enter your end_date" value="{{ old('end_date', $customers->rentals->end_date) }}">
                        @error('end_date')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                </div> --}}

                <div class="d-grid gap-2">
                    <button type="submit" class="btn1 btn btn-primary p-1.5"style="width: 20%;">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection