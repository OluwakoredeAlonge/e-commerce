@extends('layouts.dashboard')

@section('title', 'Add Product')

@section('content')
    <!-- Main Content -->
    <div class="flex-1 p-6">
      <h2 class="text-2xl font-bold text-gray-800 mb-6">Add New Product</h2>
      <div class="bg-white shadow-lg rounded-lg p-6">
        <form id="addProductForm" class="space-y-6">
          <div>
            <label for="productName" class="block text-sm font-medium text-gray-700">Product Name</label>
            <div class="mt-1 relative">
              <input type="text" id="productName" name="productName" required class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
              <svg class="w-5 h-5 absolute right-3 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            </div>
          </div>
          <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <div class="mt-1 relative">
              <select id="category" name="category" required class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="" disabled selected>Select a category</option>
                <option value="Electronics">Electronics</option>
                <option value="Accessories">Accessories</option>
                <option value="Clothing">Clothing</option>
                <option value="Home Appliances">Home Appliances</option>
              </select>
              <svg class="w-5 h-5 absolute right-3 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </div>
          </div>
          <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Price (₦)</label>
            <div class="mt-1 relative">
              <input type="number" id="price" name="price" min="0" step="0.01" required class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
              <span class="absolute left-3 top-3 text-gray-400">₦</span>
              <input type="text" class="sr-only">
            </div>
          </div>
          <div>
            <label for="stockQuantity" class="block text-sm font-medium text-gray-700">Stock Quantity</label>
            <div class="mt-1 relative">
              <input type="number" id="stockQuantity" name="stockQuantity" min="0" required class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
              <svg class="w-5 h-5 absolute right-3 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            </div>
          </div>
          <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
            <div class="mt-1">
              <textarea id="description" name="description" rows="4" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
          </div>
          <div class="flex justify-end space-x-4">
            <a href="products.html" class="flex items-center space-x-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
              <span>Cancel</span>
            </a>
            <button type="submit" class="flex items-center space-x-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
              <span>Save Product</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection