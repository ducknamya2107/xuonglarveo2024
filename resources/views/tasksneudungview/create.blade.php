@extends('master')

@section('content')
<div class="container">
    <h1>Tạo Nhiệm vụ Mới cho Dự án: {{ $project->project_name }}</h1>
    <form action="{{ route('projects.tasks.store', $project->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="task_name">Tên Nhiệm vụ</label>
            <input type="text" class="form-control" id="task_name" name="task_name" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Chưa bắt đầu">Chưa bắt đầu</option>
                <option value="Đang thực hiện">Đang thực hiện</option>
                <option value="Đã hoàn thành">Đã hoàn thành</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tạo Nhiệm vụ</button>
        <a href="{{ route('projects.tasks.index', $project->id) }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
