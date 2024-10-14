@extends('master')

@section('content')
<div class="container">
    <h1>Cập nhật Nhiệm vụ</h1>
    <form action="{{ route('projects.tasks.update', [$task->project_id, $task->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="task_name">Tên Nhiệm vụ</label>
            <input type="text" class="form-control" id="task_name" name="task_name" value="{{ $task->task_name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea class="form-control" id="description" name="description" required>{{ $task->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Chưa bắt đầu" {{ $task->status == 'Chưa bắt đầu' ? 'selected' : '' }}>Chưa bắt đầu</option>
                <option value="Đang thực hiện" {{ $task->status == 'Đang thực hiện' ? 'selected' : '' }}>Đang thực hiện</option>
                <option value="Đã hoàn thành" {{ $task->status == 'Đã hoàn thành' ? 'selected' : '' }}>Đã hoàn thành</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật Nhiệm vụ</button>
        <a href="{{ route('projects.tasks.index', $task->project_id) }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
