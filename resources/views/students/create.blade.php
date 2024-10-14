@extends('master')

@section('content')
<div class="container">
    <h1>Thêm Mới Sinh Viên</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên Sinh Viên</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="classroom_id" class="form-label">Lớp Học</label>
            <select class="form-select" id="classroom_id" name="classroom_id" required>
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Thêm Sinh Viên</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Trở Lại</a>
    </form>
</div>
@endsection
