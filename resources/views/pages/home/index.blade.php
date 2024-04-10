@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>students Managment System</h1>
            </div>
            <div class="col-lg-12">
                <form action="{{ route('home.store') }}" method="post" enctype="multipart/form">
                    @csrf
                    <div class="form">
                        <input class="form-control" name="name" type="text" placeholder="Name" aria-label="default input example" required>
                        <input class="form-control" name="age" type="text" placeholder="Age" aria-label="default input example">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">age</th>
                        <th scope="col">Status</th>
                        <th acope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $key => $student)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $student->Name }}</td>
                            <td>{{ $student->age }}</td>
                            <td>
                                @if ($student->status == 0 )
                                    <span>Inactive</span>
                                @else
                                    <span>Active</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('home.delete', $student->id) }}" class="btn btn-danger">Delete</a>
                                <a href="{{ route('home.change', $student->id) }}" class="btn btn-success">Change</a>
                                <a href="javascript:void(0)" class="btn btn-primary" onclick="studentEditModal({{ $student->id }})">Update</a>
                            </td>
                          </tr>
                        @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="studentEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Student Details Edit</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="StudentEditContent">
              ...
            </div>
          </div>
        </div>
      </div>
@endsection

@push('js')
<script>
    function studentEditModal(student_id)
    {
        var data = {
            student_id: student_id,
        };
        $.ajax({
            url: "{{ route(student.edit) }}",
            header: {
                'x-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            dataType: '',
            data: data,
            success: function (response){
                $('#studentEdit').model('show');
                $('#studentEditContent').html(response);
            }
        })
    }
</script>
@endpush
