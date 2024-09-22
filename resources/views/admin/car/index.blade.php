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
                <h4>Car</h4>
                <a href="{{ route('car.create') }}" class="btn btn1 btn-primary ">Create</a>
            </div><hr>

            <div class="py-1 table-responsive overflow">
              <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Availability</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                    <tr>
                      <th scope="row">{{ $car->id }}</th>
                      <td>{{ $car->name }}</td>
                      <td>{{ $car->brand }}</td>
                      <td>{{ $car->model }}</td>
                      <td>
                        @if ($car->availability == 1)
                          <p>Available</p>
                        @else
                          <p>Not Available</p>
                        @endif
                      </td>
                      <td>
                        <img src="{{ asset($car->image) }}" alt="" width="50px">
                      </td>
                      <td class="d-flex gap-2">
                        <a href="{{ route('carEdit', $car->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a onclick="deleteData(event)" href="{{ route('carDelete', $car->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
