@extends('layouts.base')

@section('title', 'Products')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Our Products</h1>

        <div class="text-end mb-3">
            <a href="{{ route('product.create') }}" class="btn btn-success">
                <i class="bi bi-plus-lg"></i> Create New Product
            </a>
        </div>

        @if($products->isEmpty())
            <p class="text-center text-muted">No products available.</p>
        @else
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-4">

                            <img src="{{ isset($product->image) ? asset('storage/' . $product->image) : asset('storage/no-image.jpg')}}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
                                        {{ $product->name }}
                                    </a>
                                </h5>
                                <p class="card-text text-muted">Category:
                                    <a href="{{ route('product.index') }}?category_id={{ $product->category->id }}" class="text-primary">{{ $product->category->name }}</a>
                                </p>
                                <p class="card-text">Price: <strong>${{ $product->price }}</strong></p>
                                <a href="{{ route('product.show', $product->slug) }}" class="btn btn-primary btn-sm">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $products->withQueryString()->links() }}
            </div>
        @endif
    </div>
@endsection
