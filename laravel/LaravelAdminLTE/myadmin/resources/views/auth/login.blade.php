<!-- @extends('adminlte::auth.login') -->


@section('title', 'Login')

@section('content')
<!-- Display the custom error message (Invalid credentials) -->
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<form method="POST" action="{{ route('login.post') }}">
    @csrf

    <div class="input-group mb-3">
        <input type="email" class="form-control" name="email" placeholder="Email" required value="{{ old('email') }}">
    </div>

    <div class="input-group mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Login</button>

    <div class="mt-2">
        <a href="{{ route('registerForm') }}">Don't have an account? Register</a>
    </div>
</form>
@endsection