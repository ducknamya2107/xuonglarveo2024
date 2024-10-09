@extends('master')
@section('title')
    <h1>Update nhân viên</h1>
@endsection

@section('content')
    <h1>Update nhân viên</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <form method="POST" action="{{ route('employees.update', $employee) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3 row">
                <!-- First Name -->
                <label for="firstname" class="col-4 col-form-label">First Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name"
                        value="{{ $employee->firstname }}" />
                </div>

                <!-- Last Name -->
                <label for="lastname" class="col-4 col-form-label">Last Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name"
                        value="{{ $employee->lastname }}" />
                </div>

                <!-- Email -->
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                        value="{{ $employee->email }}" />
                </div>

                <!-- Phone -->
                <label for="phone" class="col-4 col-form-label">Phone</label>
                <div class="col-8">
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone"
                        value="{{ $employee->phone }}" />
                </div>

                <!-- Date of Birth -->
                <label for="date_of_birth" class="col-4 col-form-label">Date of Birth</label>
                <div class="col-8">
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                        value="{{ $employee->date_of_birth }}" />
                </div>

                <!-- Address -->
                <label for="address" class="col-4 col-form-label">Address</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address"
                        value="{{ $employee->address }}" />
                </div>

                <!-- Hire Date -->
                <label for="hire_date" class="col-4 col-form-label">Hire Date</label>
                <div class="col-8">
                    <input type="date" class="form-control" name="hire_date" id="hire_date"
                        value="{{ $employee->hire_date }}" />
                </div>

                <!-- Salary -->
                <label for="salary" class="col-4 col-form-label">Salary</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="salary" id="salary" placeholder="Salary"
                        value="{{ $employee->salary }}" />
                </div>

                <!-- Department ID -->
                <label for="department_id" class="col-4 col-form-label">Department ID</label>
                <div class="col-8">
                    <input type="number" class="form-control" name="department_id" id="department_id"
                        value="{{ $employee->department_id }}" />
                </div>

                <!-- Manager ID -->
                <label for="manager_id" class="col-4 col-form-label">Manager ID</label>
                <div class="col-8">
                    <input type="number" class="form-control" name="manager_id" id="manager_id"
                        value="{{ $employee->manager_id }}" />
                </div>

                <!-- Is Active -->
                <label for="is_active" class="col-4 col-form-label">Is Active?</label>
                <div class="col-8">
                    <input type="checkbox" class="form-checkbox" name="is_active" id="is_active" value="1"
                        {{ $employee->is_active ? 'checked' : '' }} />
                </div>
            </div>

            <!-- Profile Picture -->
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                @if ($employee->profile_picture)
                    <img src="{{ Storage::url($employee->profile_picture) }}" width="100px" alt="Current Avatar">
                @endif
                <input type="file" class="form-control" name="profile_picture" id="profile_picture" />
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Quay lại trang chủ</a>
                </div>
            </div>
        </form>
    </div>
@endsection
