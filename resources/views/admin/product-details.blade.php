@extends('layouts.dashboard')

@section('title', $product->product_name)

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">{{ $product->product_name }}</h2>

        <p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
        <p><strong>Price:</strong> ₦{{ number_format($product->price, 2) }}</p>
        <p><strong>Stock:</strong> {{ $product->stock_quantity }}</p>
        <p><strong>Description:</strong> {{ $product->description ?? 'No description provided.' }}</p>
        <span>Created at: {{ $product->created_at->diffForHumans() }}</span>
        <span class="mx-2">·</span>
        <span>Updated at: {{ $product->updated_at->diffForHumans() }}</span>


        <div class="mt-6">
            <a href="{{ route('products.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">
                Back to Products
            </a>
        </div>
    </div>
@endsection
