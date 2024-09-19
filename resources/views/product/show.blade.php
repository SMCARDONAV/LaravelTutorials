@extends('layouts.app')

@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <img src="{{ $viewData['product']->image ?? 'https://laravel.com/img/logotype.min.svg' }}" class="card-img-top img-card" alt="{{ $viewData['product']->name }}">
            <div class="card-body text-center">
                <h5 class="card-title">{{ $viewData['product']->name }}</h5>
                <p class="card-text">Price: ${{ $viewData['product']->price }}</p>
                <a href="{{ route('product.index') }}" class="btn btn-primary">Back to Product List</a>
            </div>
        </div>
    </div>
</div>
@endsection
