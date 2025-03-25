@extends('layouts.base')

@section('title', 'Home')

@section('content')
    <div class="container text-center">
        <h1 class="my-4">Welcome to Our Store</h1>
        <p class="lead">Explore our wide range of products and categories.</p>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Our Products</h5>
                        <p class="card-text">Browse our latest collection of amazing products.</p>
                        <a href="{{ route('product.index') }}" class="btn btn-primary">View Products</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Our Categories</h5>
                        <p class="card-text">Discover products by category to find exactly what you need.</p>
                        <a href="{{ route('category.index') }}" class="btn btn-secondary">View Categories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
