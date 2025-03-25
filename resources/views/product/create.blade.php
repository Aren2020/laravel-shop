@extends('layouts.base')

@section('title', 'Create Product')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Create Product</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" enctype="multipart/form-data"
              action="{{ route('product.store') }}" class="card p-4 shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}">
            </div>

            <div>
                <label  for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="discount" class="form-label">Discount (%)</label>
                    <input type="number" name="discount" id="discount" class="form-control" value="{{ old('discount') }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock') }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <div class="border p-3 rounded">
                    @foreach($categories as $category)
                        <div class="form-check">
                            <input
                                type="checkbox"
                                name="category_id"
                                value="{{ $category->id }}"
                                class="form-check-input"
                                id="category_{{ $category->id }}"
                                @if (old('category_id') == $category->id) checked @endif
                            >
                            <label class="form-check-label" for="category_{{ $category->id }}">
                                {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
