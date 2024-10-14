@extends('master')

@section('content')
<div class="container">
    <h1>Sửa Thông Tin Sinh Viên</h1>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên Sinh Viên</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
        </div>
        <div class="mb-3">
            <label for="classroom_id" class="form-label">Lớp Học</label>
            <select class="form-select" id="classroom_id" name="classroom_id" required>
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}" {{ $classroom->id == $student->classroom_id ? 'selected' : '' }}>
                        {{ $classroom->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Cập Nhật Sinh Viên</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Trở Lại</a>
    </form>
</div>
@endsection
