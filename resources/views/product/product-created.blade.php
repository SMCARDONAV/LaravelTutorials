@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product Created</div>
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        {{ $viewData["message"] }}
                    </div>
                    <a href="{{ route('product.create') }}" class="btn btn-primary">Create Another Product</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection