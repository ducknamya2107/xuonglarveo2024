@extends('master')

@section('content')
<div class="container">
    <h1>Cập nhật Dự án</h1>
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="project_name">Tên Dự án</label>
            <input type="text" class="form-control" id="project_name" name="project_name" value="{{ $project->project_name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea class="form-control" id="description" name="description" required>{{ $project->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="start_date">Ngày bắt đầu</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $project->start_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật Dự án</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
