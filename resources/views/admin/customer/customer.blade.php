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
                <h4>Customers</h4>
                <a href="{{ route('customer.create') }}" class="btn btn1 btn-primary ">Create</a>
            </div><hr>

            <div class="py-1">
              <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col"> Total Rent</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                      <td>{{ $customer->name }}</td>
                      <td>{{ $customer->email }}</td>
                      <td>{{ $customer->phone }}</td>
                      <td>{{ $customer->rentals->count() }}</td>
                      <td>
                        <a href="{{ route('customerEdit', $customer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">view</button>
                        <a onclick="deleteData(event)" href="{{ route('customerDelete', $customer->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
