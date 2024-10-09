@extends('master')
@section('title')
    <h1>Thêm mới nhân viên</h1>
@endsection

@section('content')
    <h1>Thêm mới nhân viên</h1>

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
        <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="mb-3 row">
                <!-- First Name -->
                <label for="firstname" class="col-4 col-form-label">First Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name"
                        value="{{ old('firstname') }}" />
                </div>

                <!-- Last Name -->
                <label for="lastname" class="col-4 col-form-label">Last Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name"
                        value="{{ old('lastname') }}" />
                </div>

                <!-- Email -->
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                        value="{{ old('email') }}" />
                </div>

                <!-- Phone -->
                <label for="phone" class="col-4 col-form-label">Phone</label>
                <div class="col-8">
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone"
                        value="{{ old('phone') }}" />
                </div>

                <!-- Date of Birth -->
                <label for="date_of_birth" class="col-4 col-form-label">Date of Birth</label>
                <div class="col-8">
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                        value="{{ old('date_of_birth') }}" />
                </div>

                <!-- Address -->
                <label for="address" class="col-4 col-form-label">Address</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address"
                        value="{{ old('address') }}" />
                </div>

                <!-- Hire Date -->
                <label for="hire_date" class="col-4 col-form-label">Hire Date</label>
                <div class="col-8">
                    <input type="date" class="form-control" name="hire_date" id="hire_date"
                        value="{{ old('hire_date') }}" />
                </div>

                <!-- Salary -->
                <label for="salary" class="col-4 col-form-label">Salary</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="salary" id="salary" placeholder="Salary"
                        value="{{ old('salary') }}" />
                </div>

                <!-- Department ID -->
                <label for="department_id" class="col-4 col-form-label">Department ID</label>
                <div class="col-8">
                    <input type="number" class="form-control" name="department_id" id="department_id"
                        value="{{ old('department_id') }}" />
                </div>

                <!-- Manager ID -->
                <label for="manager_id" class="col-4 col-form-label">Manager ID</label>
                <div class="col-8">
                    <input type="number" class="form-control" name="manager_id" id="manager_id"
                        value="{{ old('manager_id') }}" />
                </div>

                <!-- Is Active -->
                <label for="is_active" class="col-4 col-form-label">Is Active?</label>
                <div class="col-8">
                    <input type="checkbox" class="form-checkbox" name="is_active" id="is_active" value="1" />
                </div>
            </div>

            <!-- Profile Picture -->
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" name="profile_picture" id="profile_picture" />
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
