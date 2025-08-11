@extends('layouts.dashboard')

@section('title', isset($product) ? 'Edit Product' : 'Add Product')

@section('content')
<div class="flex-1 p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        {{ isset($product) ? 'Edit Product' : 'Add New Product' }}
    </h2>
    <div class="bg-white shadow-lg rounded-lg p-6">
        <form method="POST" 
            action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}">
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif

            <!-- Product Name -->
            <div>
                <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                <div class="mt-1 relative">
                    <input type="text" id="product_name" name="product_name" 
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('product_name', $product->product_name ?? '') }}">
                </div>
                @error('product_name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <div class="mt-1 relative">
                    <select id="category" name="category_id" 
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled {{ !isset($product) ? 'selected' : '' }}>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price (₦)</label>
                <div class="mt-1 relative">
                    <input type="number" id="price" name="price" min="0" step="0.01" 
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('price', $product->price ?? '') }}">
                </div>
                 @error('price')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Stock Quantity -->
            <div>
                <label for="stock_quantity" class="block text-sm font-medium text-gray-700">Stock Quantity</label>
                <div class="mt-1 relative">
                    <input type="number" id="stock_quantity" name="stock_quantity" min="0" 
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('stock_quantity', $product->stock_quantity ?? '') }}">
                </div>
                 @error('stock_quantity')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $product->description ?? '') }}</textarea>
                     @error('description')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex justify-end space-x-4 mt-4">
                <a href="{{ route('products') }}"
                    class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                    Cancel
                </a>
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    {{ isset($product) ? 'Update Product' : 'Save Product' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
