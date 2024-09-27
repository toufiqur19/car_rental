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
                <h4>Contact</h4>
            </div><hr>
            
            <div class="py-1 table-responsive overflow">
                <table class="table" id="myTable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Message</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($contacts as $contact)
                      <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ Str::limit($contact->message, 20) }}</td>
                            <td><a onclick="deleteData(event)" href="{{ route('contactDelete', $contact->id) }}" class="btn btn-danger btn-sm">Delete</a></td>
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
    let table = new DataTable('#myTable', {
    responsive: true
});
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
