@extends('layouts.app')

@section('title','Customer Registration')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <h3>Customer Registration</h3>
    <form method="POST" action="{{ route('customer.register') }}">
      @csrf
      <div class="mb-3">
        <label class="form-label">First Name</label>
        <input name="first_name" value="{{ old('first_name') }}" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input name="last_name" value="{{ old('last_name') }}" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" value="{{ old('email') }}" type="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input name="password" type="password" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input name="password_confirmation" type="password" class="form-control" required>
      </div>
      <button class="btn btn-primary">Register</button>
    </form>
    <hr>
    <a href="{{ route('verify.form') }}">Enter verification code</a>
  </div>
</div>
@endsection
