@extends('layouts.dashboard')

@section('title', 'Low Stock')

@section('content')

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Low Stock Products</h2>
                <p class="text-sm text-gray-500">Restock products running low (stock below 10 units).</p>
            </div>
            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                <span>Export as CSV</span>
            </button>
        </div>

        <!-- Summary Card -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-6 border-l-4 border-green-500">
            <div class="flex items-center space-x-4">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Low Stock Products</h3>
                    <p class="text-2xl font-bold text-gray-900">0</p>
                    <p class="text-sm text-gray-500">Number of products with stock below 10 units</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('products.index') }}" class="text-green-600 hover:text-green-800 font-medium">Manage
                    Products</a>
            </div>
        </div>

        <!-- Search -->
        <div class="mb-6 flex flex-col md:flex-row gap-4">
            <div class="relative flex-1">
                <input type="text" id="productSearch" placeholder="Search by product name or category..."
                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                <svg class="w-5 h-5 absolute right-3 top-3 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>
        @if ($lowStockProducts->isEmpty())
            <p>All products are sufficiently stocked 🎉</p>
        @else
            <!-- Products Table -->
            <div class="bg-white shadow-lg rounded-lg overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Product Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Category</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price
                                (₦)</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock
                                Quantity</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                        </tr>
                    </thead>
                    <tbody id="productTable" class="divide-y divide-gray-200">
                        <!-- Filtered Data for Low Stock (below 10 units) -->
                        @foreach ($lowStockProducts as $product)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->product_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $product->category->name ?? 'No Category' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">₦ {{ $product->price }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->stock_quantity }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-500">Low Stock</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <div class="mt-4 ">
            {{ $lowStockProducts->links() }}
        </div>
    </div>
    </div>

    <!-- JavaScript for Search Functionality -->
    <script>
        function renderTable(data) {
            const tableBody = document.getElementById('productTable');
            tableBody.innerHTML = '';
            data.forEach(product => {
                const row = document.createElement('tr');
                row.className = 'hover:bg-gray-50';
                row.innerHTML = `
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${product.name}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${product.category}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${product.price}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${product.stock}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${product.status}</td>
        `;
                tableBody.appendChild(row);
            });
        }

        // Initial render
        renderTable(productData);

        // Search functionality
        document.getElementById('productSearch').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const filteredData = productData.filter(product =>
                product.name.toLowerCase().includes(searchTerm) ||
                product.category.toLowerCase().includes(searchTerm)
            );
            renderTable(filteredData);
        });
    </script>
@endsection
