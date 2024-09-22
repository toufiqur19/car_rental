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
                <h4>Rental Edit</h4>
                <a href="{{ route('rentalView') }}" class="btn btn1 btn-primary">Back</a>
            </div>

            <form action="{{ route('rentalUpdate', $rental->id) }}" method="POST" enctype="multipart/form-data" class="px-4 py-4" >
                @csrf
                @method('PUT')
                <div class=" gap-3">
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