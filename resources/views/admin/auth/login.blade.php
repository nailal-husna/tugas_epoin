@extends('auth.layouts')

@section('content')

<h1>Login</h1>
< href="{{ route('register') }}">Daftar</a>
    <br><br>
    <form action="{{ route('authenticate') }}"method="post">
        @csrf
        <label>Email Address</label><br>
        <input type="email" id="email" name="email" value="{{ old('email') }}"><br><br>
        <label>password</label>label><br>
        <input typr="password" id="password" name="password"><br><br>
        <input type="sumbit" value="Login">
    </form>

@endsection