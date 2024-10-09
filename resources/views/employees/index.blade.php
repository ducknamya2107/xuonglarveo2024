@extends('master')
@section('title')
    Danh sách khách hàng
@endsection
@section('content')
    <h1>Danh sách khách hàng</h1>
    <div class="table table-hover">
        <a name="" id="" class="btn btn-warning mt-3 mb-3" href="{{ route('employees.create') }}"
            role="button">CREATE</a>
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">FIRST NAME</th>
                    <th scope="col">LAST NAME</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">PHONE</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">SALARY</th>
                    <th scope="col">DATE OF BIRTH</th>
                    <th scope="col">HIRE DATE</th>
                    <th scope="col">DEPARTMENT ID</th>
                    <th scope="col">MANAGER ID</th>
                    <th scope="col">IS ACTIVE</th>
                    <th scope="col">CREATED AT</th>
                    <th scope="col">UPDATED AT</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $employee)
                    <tr class="">
                        <td scope="row">{{ $employee->id }}</td>
                        <td scope="row">{{ $employee->firstname }}</td>
                        <td scope="row">{{ $employee->lastname }}</td>
                        <td scope="row">{{ $employee->address }}</td>
                        <td scope="row">
                            @if ($employee->profile_picture)
                                <img src="{{ Storage::url($employee->profile_picture) }}" width="100px" alt="Profile Picture">
                            @endif
                        </td>
                        <td scope="row">{{ $employee->phone }}</td>
                        <td scope="row">{{ $employee->email }}</td>
                        <td scope="row">{{ $employee->salary }}</td>
                        <td scope="row">{{ $employee->date_of_birth }}</td>
                        <td scope="row">{{ $employee->hire_date }}</td>
                        <td scope="row">{{ $employee->department_id }}</td>
                        <td scope="row">{{ $employee->manager_id }}</td>
                        <td scope="row">
                            @if ($employee->is_active)
                                <span class="badge bg-primary">YES</span>
                            @else
                                <span class="badge bg-danger">NO</span>
                            @endif
                        </td>
                        <td scope="row">{{ $employee->created_at }}</td>
                        <td scope="row">{{ $employee->updated_at }}</td>
                        <td scope="row">
                            <a name="" id="" class="btn btn-primary"
                                href="{{ route('employees.show', $employee) }}" role="button">SHOW</a>
                            <a name="" id="" class="btn btn-warning mt-3 mb-3"
                                href="{{ route('employees.edit', $employee) }}" role="button">EDIT</a>
                            <form action="{{ route('employees.forceDestroy', $employee) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return(confirm('Bạn có chắc chắn xóa không?'))">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
@endsection
