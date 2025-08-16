@extends('layouts.dashboard')

@section('title', 'Attendant Ddashboard')
@section('content')
<body class="bg-gray-100 font-sans">
  <div class="flex flex-col min-h-screen">
    <!-- Header -->
    <header class="bg-blue-500 text-white p-4">
      <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold">E-Commerce POS</h1>
        <nav>
          <ul class="flex space-x-4">
            <li><a href="#" class="hover:underline">Dashboard</a></li>
            <li><a href="#" class="hover:underline">Process Sale</a></li>
            <li><a href="#" class="hover:underline">Products</a></li>
            <!-- <li><a href="#" class="hover:underline">Orders</a></li> -->
            <li><a href="#" class="hover:underline">Sales History</a></li>
            <li><a href="#" class="hover:underline">Logout</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto p-4 flex-grow">
      <h2 class="text-xl font-bold mb-4">Attendant Dashboard</h2>
      <p class="mb-6">Monitor your sales and manage transactions.</p>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Process New Sale -->
        <div class="card">
          <div class="card-header">
            <div class="flex items-center">
              <svg class="h-6 w-6 text-blue-500 icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
              <h3 class="text-lg font-semibold">Process New Sale</h3>
            </div>
            <a href="process-sale.html" class="text-blue-500 hover:underline">Go to Process Sale</a>
          </div>
          <div class="card-body">
            <p>Start a new sale transaction.</p>
          </div>
        </div>

        <!-- Available Products -->
        <div class="card">
          <div class="card-header">
            <div class="flex items-center">
              <svg class="h-6 w-6 text-blue-500 icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M20.25 7.5V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v1.5m16.5 0v10.5A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V7.5m16.5 0L12 12m0 0L3.75 7.5M12 12l8.25 4.5M12 12L3.75 16.5" />
              </svg>
              <h3 class="text-lg font-semibold">Available Products</h3>
            </div>
            <a href="products.html" class="text-blue-500 hover:underline">Go to Products</a>
          </div>
          <div class="card-body">
            <p class="text-2xl font-bold">0</p>
            <p>Products in stock for sale.</p>
          </div>
        </div>

        <!-- My Total Sales -->
        <div class="card">
          <div class="card-header">
            <div class="flex items-center">
              <svg class="h-6 w-6 text-blue-500 icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <h3 class="text-lg font-semibold">My Total Sales</h3>
            </div>
            <a href="sales.html" class="text-blue-500 hover:underline">Go to Sales History</a>
          </div>
          <div class="card-body">
            <p class="text-2xl font-bold">₦0.00</p>
            <p>Your sales in the last 30 days.</p>
          </div>
        </div>

        <!-- Low Stock Alerts -->
        <div class="card">
          <div class="card-header">
            <div class="flex items-center">
              <svg class="h-6 w-6 text-blue-500 icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>
              <h3 class="text-lg font-semibold">Low Stock Alerts</h3>
            </div>
            <a href="low-stock-products.html" class="text-blue-500 hover:underline">Go to Products</a>
          </div>
          <div class="card-body">
            <p class="text-2xl font-bold">0</p>
            <p>Products needing restocking.</p>
          </div>
        </div>
<!-- Orders Card -->
<div class="card">
    <div class="card-header">
        <div class="flex items-center">
            <!-- Orders Icon -->
            <svg class="h-6 w-6 text-blue-500 icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-2.293 
                      2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 
                      0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 
                      0 014 0z" />
            </svg>
            <h3 class="text-lg font-semibold">Orders</h3>
        </div>
        <a href="orders.html" class="text-blue-500 hover:underline">Go to Orders</a>
    </div>
    <div class="card-body">
        <p class="text-2xl font-bold">0</p>
        <p>Total customer orders placed.</p>
    </div>
</div>

        <!-- Quick Access Products -->
        <div class="card">
          <div class="card-header">
            <div class="flex items-center">
              <svg class="h-6 w-6 text-blue-500 icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.95-.69l1.519-4.674z" />
              </svg>
              <h3 class="text-lg font-semibold">Quick Access Products</h3>
            </div>
            <a href="set-products.html" class="text-blue-500 hover:underline">Set Products</a>
          </div>
          <div class="card-body">
            <p class="text-2xl font-bold">10</p>
            <p>Customize products for quick access in Process Sale.</p>
          </div>
        </div>
        <!-- Top Selling Product -->
        <div class="card">
          <div class="card-header">
            <div class="flex items-center">
              <svg class="h-6 w-6 text-blue-500 icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 3v18h18M9 13h3v5H9v-5zm4-4h3v9h-3V9zm4-6h3v15h-3V3z" />
              </svg>
              <h3 class="text-lg font-semibold">Top Selling Product</h3>
            </div>
            <a href="sales-history.html" class="text-blue-500 hover:underline">View Sales</a>
          </div>
          <div class="card-body">
            <p class="text-2xl font-bold">Product Name</p>
            <p class="text-gray-600">Sold <span class="font-semibold">25</span> times this month</p>
          </div>
        </div>

      </div>
    </main>
  </div>
@endsection