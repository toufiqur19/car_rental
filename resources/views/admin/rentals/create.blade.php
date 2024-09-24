@extends('admin.layout.app')

@section('content')
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
        
    <div class="content car">
        <div class="carContent px-4 py-4">
            <div class="d-flex justify-content-between">
                <h4>Rental Create</h4>
                <a href="{{ route('rentalView') }}" class="btn btn1 btn-primary">Back</a>
            </div>

            <form action="{{ route('rentalStore') }}" method="POST" enctype="multipart/form-data" class="px-4 py-4" >
                @csrf
                <div class=" gap-3">
                    <div class="row">
                        <div class="mb-3 col-lg-6">
                            <label for="email" class="form-label">User Email</label>
                            <input type="email" name="email" placeholder="Enter your email">
                            @error('email')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                             @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-lg-6">
                            <label for="car_id" class="form-label">Car Id</label>
                            <input type="text" name="car_id" placeholder="Enter your car_id">
                            @error('car_id')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                             @enderror
                        </div>
                    </div>
                    <div class="mb-3 form-width">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date">
                        @error('start_date')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 form-width">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" name="end_date">
                        @error('end_date')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn1 btn btn-primary p-1.5">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection