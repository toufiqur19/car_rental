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
                <h4>Customer Create</h4>
                <a href="{{ route('customerView') }}" class="btn btn1 btn-primary">Back</a>
            </div>

            <form action="{{ route('customerStore')}}" method="POST" class="px-3 py-3">
                @csrf
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" name="name" class="form-control" id="name" placeholder="Enter your name" value="{{ old('name') }}">
                        @error('name')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}">
                        @error('email')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter your phone" value="{{ old('phone') }}">
                        @error('phone')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Enter your address" value="{{ old('address') }}">
                        @error('address')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" value="{{ old('password') }}">
                        @error('password')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="password" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="cpassword" placeholder="Enter your confirm password" value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
                            <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btnauth p-1.5">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection