@extends('master')

@section('content')
<div class="container">
    <h1>Danh Sách Sinh Viên</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Thêm Mới Sinh Viên</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Lớp Học</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->classroom->name }}</td>
                <td>
                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">Xem</a>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $students->links() }} <!-- Phân trang -->
</div>
@endsection
