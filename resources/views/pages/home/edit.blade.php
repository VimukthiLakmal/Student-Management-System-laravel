<form action="{{ route('home.update',$student->id) }}" method="post" enctype="multipart/form">
    @csrf
    <div class="form">
        <input class="form-control" name="name" value="{{ $student->name }}" type="text" placeholder="Name" aria-label="default input example" required>
        <input class="form-control" name="age" type="text" placeholder="Age" aria-label="default input example">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>
