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
                <h4>Rentals</h4>
                <a href="{{ route('car.create') }}" class="btn btn1 btn-primary ">Create</a>
            </div><hr>

            <div class="py-1">
              <table class="table" id="myTable">
                <thead style="background: #009CFF;color: white">
                  <tr>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Car Details</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Total Cost</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($rentals as $rental)
                    <tr>
                      <td>{{ $rental->user->name }}</td>
                      <td>{{ $rental->car->name }}({{ $rental->car->brand }})</td>
                      <td>{{ $rental->start_date }}</td>
                      <td>{{ $rental->end_date }}</td>
                      <td>{{ $rental->total_cost }}</td>
                      <td>
                        @if ($rental->status == 1)
                          <p>Complete</p>
                        @else
                          <p>Cancel</p>
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('rentalEdit', $rental->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a onclick="deleteData(event)" href="{{ route('rentalDelete', $rental->id) }}" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
 let table = new DataTable('#myTable');
</script>
<script>
  function deleteData(e){
    e.preventDefault();
    var url = e.currentTarget.getAttribute('href');
    
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this data!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willCancel) => {
      if (willCancel) {
        window.location.href = url;
      } else {
        swal("Your imaginary file is safe!");
      }
    });
  }
</script>
@endsection
