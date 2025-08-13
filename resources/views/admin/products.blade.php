@extends('layouts.dashboard')

@section('title', 'All Products')

@section('content')

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Manage Products</h2>
            <a href="{{ route('products.create') }}"
                class="flex items-center space-x-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                <span>Add New Product</span>
            </a>
        </div>

        <!-- Search Bar -->
        <div class="mb-6">
            <div class="relative">
                <input type="text" id="productSearch" placeholder="Search products..."
                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <svg class="w-5 h-5 absolute right-3 top-3 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Products Table -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <!-- Serial Number -->
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product
                            Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price (₦)
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock
                            Quantity</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="productTableBody">
                    @foreach ($products as $index => $product)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                            <!-- Serial Number -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <a href="{{ route('products.show', $product->id) }}" class="text-blue-600 hover:underline">
                                    {{ $product->product_name }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $product->category->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                ₦{{ number_format($product->price, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->stock_quantity }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm
          @if ($product->stock_quantity > 10) text-green-600
          @elseif($product->stock_quantity > 0) text-yellow-600
          @else text-red-600 @endif
          ">
                                @if ($product->stock_quantity > 10)
                                    In Stock
                                @elseif($product->stock_quantity > 0)
                                    Low Stock
                                @else
                                    Out of Stock
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex space-x-3">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="text-blue-600 hover:text-blue-800" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" title="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4M3 7h18" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Laravel pagination links -->
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
    </div>

    <!-- JavaScript for Search Functionality -->
    <script>
        document.getElementById('productSearch').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#productTableBody tr');
            rows.forEach(row => {
                const productName = row.cells[1].textContent.toLowerCase();
                const category = row.cells[2].textContent.toLowerCase();
                if (productName.includes(searchTerm) || category.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
