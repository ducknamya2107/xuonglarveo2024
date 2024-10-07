@extends('master')
@section('title')
    Danh sach khach hang
@endsection
@section('content')
    <h1>Danh sach khach hang</h1>
    <div class="table table-hover">
        <a name="" id="" class="btn btn-warning mt-3 mb-3" href="{{ route('customers.create') }}"
            role="button">CREATE</a>
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">PHONE</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">IS_ACTIVE</th>
                    <th scope="col">CREATED_AT</th>
                    <th scope="col">UPDATED_AT</th>
                    <th scope="col">ACION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $customer)
                    <tr class="">
                        <td scope="row">{{ $customer->id }}</td>
                        <td scope="row">{{ $customer->name }}</td>
                        <td scope="row">{{ $customer->address }}</td>
                        <td scope="row">
                            @if ($customer->avatar)
                                <img src="{{ Storage::url($customer->avatar) }}"width="100px" alt="">
                            @endif
                        </td>
                        <td scope="row">{{ $customer->phone }}</td>
                        <td scope="row">{{ $customer->email }}</td>
                        <td scope="row">
                            @if ($customer->is_active)
                                <span class="badge bg-primary">YES</span>
                            @else
                                <span class="badge bg-danger">NO</span>
                            @endif

                        </td>
                        <td scope="row">{{ $customer->created_at }}</td>
                        <td scope="row">{{ $customer->updated_at }}</td>
                        <td scope="row">
                            <a name="" id="" class="btn btn-primary"
                                href="{{ route('customers.show', $customer) }}" role="button">SHOW</a>
                            <a name="" id="" class="btn btn-warning mt-3 mb-3"
                                href="{{ route('customers.edit', $customer) }}" role="button">EDIT</a>
                            {{-- <form action="{{ route('customers.destroy', $customer) }} " method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger  mb-3"
                                    onclick="return(confirm('co chac chan xoa ko'))">XOA MEM</button>
                            </form> --}}
                            <form action="{{ route('customers.forceDestroy', $customer) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return(confirm('co chac chan xoa ko'))">DELETE</button>
                            </form>
                        </td>
                        {{-- <td scope="row">{{ }}</td> --}}

                    </tr>
                @endforeach

            </tbody>

        </table>
        {{ $data->links() }}
    </div>
@endsection
