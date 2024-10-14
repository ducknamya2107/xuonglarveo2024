@extends('master')

@section('content')
<div class="container">
    <h1>Danh sách Dự án</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary">Tạo Dự án Mới</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Dự án</th>
                <th>Mô tả</th>
                <th>Ngày bắt đầu</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->project_name }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->start_date }}</td>
                <td>
                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info">Chi tiết</a>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Cập nhật</a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
