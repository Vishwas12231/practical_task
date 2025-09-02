@extends('layouts.app')

@section('title','Admin Login')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <h3>Admin Login</h3>

    <form method="POST" action="{{ route('admin.login.submit') }}">
      @csrf
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" value="{{ old('email') }}" type="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input name="password" type="password" class="form-control" required>
      </div>
      <button class="btn btn-primary">Login</button>
    </form>

    <hr>
    <p>
      Not an admin? <a href="{{ route('customer.register.form') }}">Register as Customer</a> |
      <a href="{{ route('admin.register.form') }}">Register as Admin</a> |
      <a href="{{ route('verify.form') }}">Verify account</a>
    </p>
  </div>
</div>
@endsection