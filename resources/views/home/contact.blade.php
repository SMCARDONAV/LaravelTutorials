@extends('layouts.app')
@section('title', 'Contact Us - Online Store')
@section('subtitle', 'Contact')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="contact-details">
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Address:</strong> {{ $address }}</p>
        <p><strong>Phone:</strong> {{ $phone }}</p>
      </div>
    </div>
  </div>
</div>
@endsection
