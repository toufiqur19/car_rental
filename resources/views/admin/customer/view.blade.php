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
                <hr>
                <div class="py-1 table-responsive overflow">
                    <table class="table" id="myTable">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Car Id</th>
                          <th scope="col">User Id</th>
                          <th scope="col">Start Date</th>
                          <th scope="col">End Date</th>
                          <th scope="col"> Total Cost</th>
                        </tr>
                      </thead>
                      <tbody>
                            @if($rentals->count() > 0)
                            <p>Rental History</p>
                                @foreach ($rentals as $rentals)
                                <tr>
                                <td>{{ $rentals->id }}</td>
                                <td>{{ $rentals->car_id }}</td>
                                <td>{{ $rentals->user_id }}</td>
                                <td>{{ $rentals->start_date }}</td>
                                <td>{{ $rentals->end_date }}</td>
                                <td>{{ $rentals->total_cost }}</td>
                                </tr>
                                @endforeach
                            @else
                                <p>Customer has no rental</p>
                            @endif
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
@endsection