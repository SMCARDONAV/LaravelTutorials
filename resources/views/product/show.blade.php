@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           {{ $viewData["product"]["name"] }}
        </h5>
        <p class="card-text">{{ $viewData["product"]["price"] }}</p>

        <h6>Comments:</h6>
        @forelse($viewData["product"]->comments as $comment)
          <p>- {{ $comment->getDescription() }}</p>
        @empty
          <p>No comments yet.</p>
        @endforelse

      </div>
    </div>
  </div>
</div>
@endsection

