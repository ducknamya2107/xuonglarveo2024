@extends('master')

@section('content')
<div class="container">
    <h1>Danh sách Nhiệm vụ cho Dự án: {{ $project->project_name }}</h1>
    <a href="{{ route('projects.tasks.create', $project->id) }}" class="btn btn-primary">Tạo Nhiệm vụ Mới</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Nhiệm vụ</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($project->tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->task_name }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->status }}</td>
                <td>
                    <a href="{{ route('projects.tasks.show', [$project->id, $task->id]) }}" class="btn btn-info">Chi tiết</a>
                    <a href="{{ route('projects.tasks.edit', [$project->id, $task->id]) }}" class="btn btn-warning">Cập nhật</a>
                    <form action="{{ route('projects.tasks.destroy', [$project->id, $task->id]) }}" method="POST" style="display:inline;">
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
