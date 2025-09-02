@extends('layouts.app')

@section('title','Admin Dashboard')

@section('content')
<div class="row">
  <div class="col-md-12">
    <h3>Admin Dashboard</h3>
    <p>Welcome, {{ auth()->user()->first_name ?? auth()->user()->email }}!</p>

    <form method="POST" action="{{ route('admin.logout') }}">
      @csrf
      <button class="btn btn-danger">Logout</button>
    </form>
  </div>
</div>
@endsection