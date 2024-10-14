@extends('master')

@section('content')
<div class="container">
    <h1>Chi tiết Nhiệm vụ</h1>
    <p><strong>Tên Nhiệm vụ:</strong> {{ $task->task_name }}</p>
    <p><strong>Mô tả:</strong> {{ $task->description }}</p>
    <p><strong>Trạng thái:</strong> {{ $task->status }}</p>
    <a href="{{ route('projects.tasks.index', $task->project_id) }}" class="btn btn-secondary">Quay lại</a>
    <a href="{{ route('projects.tasks.edit', [$task->project_id, $task->id]) }}" class="btn btn-warning">Cập nhật</a>
</div>
@endsection
