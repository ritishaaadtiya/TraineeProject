<!-- @extends('adminlte::auth.register') -->


@section('title', 'Register')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="/register">
    @csrf

    <div class="input-group mb-3">
        <input type="text" class="form-control" name="name" placeholder="Full name" required value="{{ old('name') }}">
    </div>

    <div class="input-group mb-3">
        <input type="email" class="form-control" name="email" placeholder="Email" required value="{{ old('email') }}">
    </div>

    <div class="input-group mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>

    <div class="input-group mb-3">
        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Register</button>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
</form>
@endsection