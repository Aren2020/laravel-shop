@extends('layouts.base')

@section('title', 'Product Info')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm p-4">
            <h2 class="mb-3">{{ $product->name }}</h2>

            <div class="text-center mb-3">
                <img src="{{ asset('storage/' . $product->image) }}"
                     class="img-fluid" alt="{{ $product->name }}" width="200">
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Description:</strong> {{ $product->description }}</li>
                <li class="list-group-item"><strong>Price:</strong> ${{ $product->price }}</li>
                <li class="list-group-item"><strong>Discount:</strong> {{ $product->discount }}%</li>
                <li class="list-group-item"><strong>Stock:</strong> {{ $product->stock }} available</li>
            </ul>

            <a href="{{ route('product.destroy', $product->slug) }}"
               class="btn btn-danger"
               onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this product?')) document.getElementById('delete-form-{{ $product->slug }}').submit();">
                Delete
            </a>
            <form id="delete-form-{{ $product->slug }}" action="{{ route('product.destroy', $product->slug) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>

            <a href="{{ route('product.edit', $product->slug) }}" class="btn btn-secondary">Edit</a>

            <a href="{{ route('product.index') }}" class="btn btn-primary mt-3">Back to Products</a>

        </div>
    </div>
@endsection
