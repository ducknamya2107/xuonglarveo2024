@extends('master')

@section('title')
    <h1>Thông tin nhân viên</h1>
@endsection

@section('content')
    <div class="container">
        <div class="card card-custom">
            <h5 class="card-title">ID: {{ $employee->id }}</h5>
            <ul class="list-group list-group-flush">
                <!-- First Name -->
                <li class="list-group-item"><strong>First Name:</strong> {{ $employee->firstname }}</li>

                <!-- Last Name -->
                <li class="list-group-item"><strong>Last Name:</strong> {{ $employee->lastname }}</li>

                <!-- Address -->
                <li class="list-group-item"><strong>Address:</strong> {{ $employee->address }}</li>

                <!-- Email -->
                <li class="list-group-item"><strong>Email:</strong> {{ $employee->email }}</li>

                <!-- Phone -->
                <li class="list-group-item"><strong>Phone:</strong> {{ $employee->phone }}</li>

                <!-- Date of Birth -->
                <li class="list-group-item"><strong>Date of Birth:</strong> {{ $employee->date_of_birth }}</li>

                <!-- Hire Date -->
                <li class="list-group-item"><strong>Hire Date:</strong> {{ $employee->hire_date }}</li>

                <!-- Salary -->
                <li class="list-group-item"><strong>Salary:</strong> {{ $employee->salary }}</li>

                <!-- Department ID -->
                <li class="list-group-item"><strong>Department ID:</strong> {{ $employee->department_id }}</li>

                <!-- Manager ID -->
                <li class="list-group-item"><strong>Manager ID:</strong> {{ $employee->manager_id }}</li>

                <!-- Profile Picture -->
                {{-- <li class="list-group-item">
                    <strong>Profile Picture:</strong><br>
                    @if ($employee->profile_picture)
                        <img src="{{ Storage::url($employee->profile_picture) }}" width="200px" alt="Profile Picture">
                    @else
                        No image available.
                    @endif
                </li> --}}

                <!-- Is Active -->
                <li class="list-group-item">
                    <strong>Active:</strong>
                    @if ($employee->is_active)
                        <span class="badge bg-primary">YES</span>
                    @else
                        <span class="badge bg-danger">NO</span>
                    @endif
                </li>

                <!-- Created At -->
                <li class="list-group-item">
                    <strong>Created At:</strong> {{ $employee->created_at }}
                </li>

                <!-- Updated At -->
                <li class="list-group-item">
                    <strong>Updated At:</strong> {{ $employee->updated_at }}
                </li>
            </ul>
            <a href="{{ route('employees.index') }}" class="btn btn-primary mt-3">Quay lại trang chủ</a>
        </div>
    </div>
@endsection
