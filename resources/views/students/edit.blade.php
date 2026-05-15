<x-app-layout>
<div class="container mt-4">

    <h2>Edit Student</h2>

    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $student->name }}" class="form-control mb-2">

        <input type="email" name="email" value="{{ $student->email }}" class="form-control mb-2">

        <input type="text" name="phone" value="{{ $student->phone }}" class="form-control mb-2">

        <input type="text" name="course" value="{{ $student->course }}" class="form-control mb-2">

        <input type="file" name="image" class="form-control mb-2">

        @if($student->image)
            <img src="{{ asset('storage/'.$student->image) }}" width="80">
        @endif

        <button class="btn btn-success">Update</button>

    </form>

</div>
</x-app-layout>