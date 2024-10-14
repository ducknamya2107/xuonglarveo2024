@extends('master')

@section('content')
<div class="container">
    <h1>Tạo Dự án Mới</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="project_name">Tên Dự án</label>
            <input type="text" class="form-control" id="project_name" name="project_name" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="start_date">Ngày bắt đầu</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Tạo Dự án</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
