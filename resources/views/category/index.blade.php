@extends('layouts.base')

@section('title', 'Categories')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Product Categories</h1>

        @if($categories->isEmpty())
            <p class="text-center text-muted">No categories available.</p>
        @else
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <a href="{{ route('product.index') }}?category_id={{ $category->id }}"
                                   class="btn btn-primary btn-sm">
                                    View Products
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
@endsection
