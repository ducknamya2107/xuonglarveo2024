@extends('master')
@section('title')
    <h1>Update khách hàng</h1>
@endsection

@section('content')
    <h1>Update khách hàng</h1>

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
        <form method="POST" action="{{ route('customers.update', $customer) }}" enctype="multipart/form-data">
            <!-- Thêm enctype -->
            @csrf
            @method('PUT')

            <div class="mb-3 row">
                <!-- Name -->
                <label for="name" class="col-4 col-form-label">Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                        value="{{ $customer->name }}" />
                </div>

                <!-- Address -->
                <label for="address" class="col-4 col-form-label">Address</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address"
                        value="{{ $customer->address }}" />
                </div>

                <!-- Phone -->
                <label for="phone" class="col-4 col-form-label">Phone</label>
                <div class="col-8">
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone"
                        value="{{ $customer->phone }}" />
                </div>

                <!-- Email -->
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                        value="{{ $customer->email }}" />
                </div>

                <!-- Is Active -->
                <label for="is_active" class="col-4 col-form-label">Is Active?</label>
                <div class="col-8">
                    <input type="checkbox" class="form-checkbox" name="is_active" id="is_active" value="1" />
                </div>
            </div>

            <!-- Avatar -->
            <div class="mb-3">
                <label for="avatar" class="form-label">Choose file</label>
                @if ($customer->avatar)
                    <img src="{{ Storage::url($customer->avatar) }}" width="100px" alt="Current Avatar">
                @endif
                <input type="file" class="form-control" name="avatar" id="avatar" placeholder="avatar"
                    aria-describedby="fileHelpId" />
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('customers.index') }}">Quay lại trang chủ</a>

                </div>
            </div>
        </form>
    </div>

@endsection