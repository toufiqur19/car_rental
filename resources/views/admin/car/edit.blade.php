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
                <h4>Car Edit</h4>
                <a href="{{ route('carView') }}" class="btn btn1 btn-primary">Back</a>
            </div>

            <form action="{{ route('carUpdate', $cars->id) }}" method="POST" enctype="multipart/form-data" class="px-4 py-4" >
                @csrf
                @method('PUT')
                <div class="d-flex gap-3">
                    <div class="mb-3 form-width">
                        <label for="name" class="form-label">Car Name</label>
                        <input type="text" name="name" class="form-control p-1.5 fs-6" id="name" placeholder="Enter car name" value="{{ old('name', $cars->name) }}">
                        @error('name')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 form-width">
                        <label for="brand" class="form-label">Car Brand</label>
                        <input type="text" name="brand" class="form-control p-1.5 fs-6" id="brand" placeholder="Enter car brand" value="{{ old('brand', $cars->brand) }}">
                        @error('brand')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <div class="mb-3 form-width">
                        <label for="model" class="form-label">Car Model</label>
                        <input type="text" name="model" class="form-control p-1.5 fs-6" id="model" placeholder="Enter car model" value="{{ old('model', $cars->model) }}">
                        @error('model')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 form-width">
                        <label for="year" class="form-label">Car Year</label>
                        <input type="text" name="year" class="form-control p-1.5 fs-6" id="year" placeholder="Enter car year" value="{{ old('year', $cars->year) }}">
                        @error('year')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <div class="mb-3 form-width">
                        <label for="car_type" class="form-label">Car Type</label>
                        <input type="text" name="car_type" class="form-control p-1.5 fs-6" id="car_type" placeholder="Enter car car_type" value="{{ old('car_type', $cars->car_type) }}">
                        @error('car_type')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 form-width">
                        <label for="daily_rent_price" class="form-label">Car Daily Rent Price</label>
                        <input type="text" name="daily_rent_price" class="form-control p-1.5 fs-6" id="daily_rent_price" placeholder="Enter car daily_rent_price" value="{{ old('daily_rent_price', $cars->daily_rent_price) }}">
                        @error('daily_rent_price')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <div class="mb-3">
                        <label for="image" class="form-label">Car Image</label>
                        <input type="file" name="image" class="form-control p-1.5 fs-6" id="image" placeholder="Enter car image" value="{{ old('image') }}">
                        <div class="mt-3">
                            @if ($cars->image)
                                <img src="{{ asset($cars->image) }}" alt="" width="50px">
                            @endif
                        </div>
                        @error('image')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn1 btn btn-primary p-1.5"style="width: 20%;">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection