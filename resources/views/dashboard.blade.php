@extends('master')

@section('content')
<h2>Dashboard</h2>
<p>Chào mừng {{ session('user_id') }}</p>
<a href="{{ route('logout') }}">Đăng Xuất</a>
@endsection