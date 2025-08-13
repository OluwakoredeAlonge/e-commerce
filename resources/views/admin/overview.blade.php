@extends('layouts.dashboard')

@section('title', 'Overview')

@section('content')
    <div class="flex min-h-screen">
        <!-- Sidebar -->
    
        <!-- Rest of overview.html remains unchanged -->

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Admin Overview</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Revenue Card -->
                <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-green-500">
                    <div class="flex items-center space-x-4">
                        <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Total Revenue</h3>
                            <p class="text-2xl font-bold text-gray-900">₦0.00</p>
                            <p class="text-sm text-gray-500">Track your earnings instantly.</p>
                            <a href="{{ route('sales-history') }}" class="text-green-600 hover:text-green-800 font-medium">View
                                Sales
                                History</a>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Revenue from sales in the last 7 days</p>
                </div>

                <!-- Daily Sales Card -->
                <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-green-500">
                    <div class="flex items-center space-x-4">
                        <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Daily Sales</h3>
                            <p class="text-2xl font-bold text-gray-900">0</p>
                            <p class="text-sm text-gray-500">Track today’s sales instantly.</p>
                            <a href="{{ route('sales-history') }}" class="text-green-600 hover:text-green-800 font-medium">View
                                Sales
                                History</a>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Number of sales completed today</p>
                </div>

                <!-- Low Stock Products Card -->
                <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-green-500">
                    <div class="flex items-center space-x-4">
                        <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2V7m16 0v14a2 2 0 01-2 2H6a2 2 0 01-2-2V7">
                            </path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Low Stock Products</h3>
                            <p class="text-2xl font-bold text-gray-900">0</p>
                            <p class="text-sm text-gray-500">Restock products running low.</p>
                            <a href="{{ route('products.lowStock') }}" class="text-green-600 hover:text-green-800 font-medium">Manage Low
                                Stock
                                Products</a>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Products with stock below 10 units or completely out of stock
                    </p>
                </div>

                <!-- Total Products Card -->
                <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-green-500">
                    <div class="flex items-center space-x-4">
                        <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Total Products</h3>
                            <p class="text-2xl font-bold text-gray-900">{{$totalProducts}}</p>
                            <p class="text-sm text-gray-500">Track all your inventory items.</p>
                            <a href="{{ route('products.index') }}" class="text-green-600 hover:text-green-800 font-medium">Manage
                                Products</a>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Total number of products available</p>
                </div>

                <!-- Total Categories Card -->
                <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-green-500">
                    <div class="flex items-center space-x-4">
                        <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Total Categories</h3>
                            <p class="text-2xl font-bold text-gray-900">{{$totalCategories}}</p>
                            <p class="text-sm text-gray-500">Organize products with categories.</p>
                            <a href="{{route('categories.index')}}" class="text-green-600 hover:text-green-800 font-medium">Manage
                                Categories</a>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Number of product categories</p>
                </div>

                <!-- Add New Product Card -->
                <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-green-500">
                    <div class="flex items-center space-x-4">
                        <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                            </path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Add New Product</h3>
                            <p class="text-sm text-gray-500">Quickly add products to your inventory.</p>
                            <a href="{{route('products.create')}}" class="text-green-600 hover:text-green-800 font-medium">Add
                                Product</a>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Create a new product entry</p>
                </div>

                <!-- Manage Attendants Card -->
                <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-green-500">
                    <div class="flex items-center space-x-4">
                        <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Manage Attendants</h3>
                            <p class="text-sm text-gray-500">Add new attendants or view active staff managing sales.
                            </p>
                            <div class="space-x-2">
                                <a href="{{route('add-attendant')}}"
                                    class="text-green-600 hover:text-green-800 font-medium">Add Attendant</a>
                                <a href="{{route('add-attendant')}}#attendantTable" class="text-green-600 hover:text-green-800 font-medium">View
                                    Active
                                    Attendants</a>
                            </div>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Number of active attendants: 0</p>
                </div>

                <!-- Total Orders Card -->
                <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-green-500">
                    <div class="flex items-center space-x-4">
                        <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Total Orders</h3>
                            <p class="text-2xl font-bold text-gray-900">4</p>
                            <p class="text-sm text-gray-500">Track all customer orders.</p>
                            <a href="{{route('orders')}}" class="text-green-600 hover:text-green-800 font-medium">View
                                Orders</a>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Number of orders placed in the last 7 days</p>
                </div>

                <!-- Register Business Card -->
                <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-green-500">
                    <div class="flex items-center space-x-4">
                        <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a2 2 0 012-2h2a2 2 0 012 2v5m-4 0h4">
                            </path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Register Business</h3>
                            <p class="text-sm text-gray-500">Set up your business details for receipts and invoices.
                            </p>
                            <a href="{{route('register-business')}}"
                                class="text-green-600 hover:text-green-800 font-medium">Register
                                Business</a>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Configure organization name, address, and contact details</p>
                </div>

                <!-- Top Selling Product Card -->
                <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-green-500">
                    <div class="flex items-center space-x-4">
                        <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6">
                            </path>
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Top Selling Product</h3>
                            <p class="text-2xl font-bold text-gray-900">None</p>
                            <p class="text-sm text-gray-500">Boost your bestsellers.</p>
                            <a href="products.html" class="text-green-600 hover:text-green-800 font-medium">View
                                Products</a>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Most sold product in the past week</p>
                </div>
            </div>
        </div>
    </div>
@endsection