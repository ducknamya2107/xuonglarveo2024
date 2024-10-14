@extends('master')

@section('content')
<div class="container">
    <h1>Chi tiết Dự án</h1>
    <p><strong>Tên Dự án:</strong> {{ $project->project_name }}</p>
    <p><strong>Mô tả:</strong> {{ $project->description }}</p>
    <p><strong>Ngày bắt đầu:</strong> {{ $project->start_date }}</p>
    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Quay lại</a>
    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Cập nhật</a>
</div>
@endsection
