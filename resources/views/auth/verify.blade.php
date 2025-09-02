@extends('layouts.app')

@section('title','Verify Account')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <h3>Verify Your Account</h3>
    <p>Enter the verification code you received by email.</p>

    <form method="POST" action="{{ route('verify.submit') }}">
      @csrf
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" value="{{ old('email') }}" type="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Verification Code</label>
        <input name="code" value="{{ old('code') }}" class="form-control" required>
      </div>
      <button class="btn btn-success">Verify</button>
    </form>
  </div>
</div>
@endsection