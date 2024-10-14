@extends('master')

@section('content')
<div class="container">
    <h1>Chi Tiết Sinh Viên</h1>
    <p><strong>ID:</strong> {{ $student->id }}</p>
    <p><strong>Tên:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Lớp Học:</strong> {{ $student->classroom->name }}</p>
    <p><strong>Số Hộ Chiếu:</strong> {{ $student->passport ? $student->passport->passport_number : 'Chưa có' }}</p>
    <p><strong>Môn Học:</strong></p>
    <ul>
        @foreach ($student->subjects as $subject)
            <li>{{ $subject->name }}</li>
        @endforeach
    </ul>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Trở Lại</a>
</div>
@endsection
