@extends('master')
{{-- @section('content')
<h3 scope="row" class="">ID :{{ $customer->id }}</h3>
<h3>Name:{{ $customer->name }}</h3>
<h3>Adress:{{ $customer->adress }}</h3>
<h3>Email:{{ $customer->email }}</h3>
<h3>Phone:{{ $customer->phone }}</h3>
<h3>
    Img:
    <img src="{{ Storage::url($customer->avatar) }}" width="200px" alt="">
</h3>
<h3>Active:
    @if ($customer->is_active)
        <span class="badge bg-primary">YES</span>
    @else
        <span class="badge bg-danger">NO</span>
    @endif
</h3>
<h3>Created At:{{ $customer->created_at }}</h3>
<h3>Updated At:{{ $customer->updated_at }}</h3>

@endsection --}}
@section('content')
    <div class="container">
        <div class="card card-custom">
            <h5 class="card-title">ID :{{ $customer->id }}</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Name:</strong>{{ $customer->name }}</li>
                <li class="list-group-item"><strong>Adress:</strong> {{ $customer->adress }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $customer->email }}</li>
                <li class="list-group-item"><strong>Phone:</strong>{{ $customer->phone }}</li>
                <li class="list-group-item">
                    <strong>Img:</strong><br>
                    <img src="{{ Storage::url($customer->avatar) }}" width="200px" alt="">
                </li>
                <li class="list-group-item">
                    <strong>Active:</strong>
                    @if ($customer->is_active)
                        <span class="badge bg-primary">YES</span>
                    @else
                        <span class="badge bg-danger">NO</span>
                    @endif
                </li>
                <li class="list-group-item">
                    <strong>Created At:</strong> {{ $customer->created_at }}
                </li>
                <li class="list-group-item">
                    <strong>Updated At:</strong> {{ $customer->updated_at }}
                </li>
            </ul>
            <a href="{{ route('customers.index') }}" class="btn btn-primary mt-3">Quay lại trang chủ</a>

        </div>
    </div>
@endsection