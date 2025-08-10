@extends('layouts.dashboard')

@section('title', 'Daily Sales')

@section('content')

    <!-- Main Content -->
    <div class="flex-1 p-6">
      <div class="flex justify-between items-center mb-6">
        <div>
          <h2 class="text-2xl font-bold text-gray-800">Daily Sales</h2>
          <p class="text-sm text-gray-500">Track today’s sales instantly (August 9, 2025).</p>
        </div>
        <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 flex items-center space-x-2">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
          <span>Export as CSV</span>
        </button>
      </div>

      <!-- Summary Card -->
      <div class="bg-white shadow-lg rounded-lg p-6 mb-6 border-l-4 border-green-500">
        <div class="flex items-center space-x-4">
          <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-2a2 2 0 00-2-2H5a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
          <div>
            <h3 class="text-lg font-semibold text-gray-800">Total Sales Today</h3>
            <p class="text-2xl font-bold text-gray-900">0</p>
            <p class="text-sm text-gray-500">Number of sales completed today</p>
          </div>
        </div>
        <div class="mt-4">
          <a href="sales-history.html" class="text-green-600 hover:text-green-800 font-medium">View Sales History</a>
        </div>
      </div>

      <!-- Search -->
      <div class="mb-6 flex flex-col md:flex-row gap-4">
        <div class="relative flex-1">
          <input type="text" id="salesSearch" placeholder="Search by customer, attendant, or product..." class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
          <svg class="w-5 h-5 absolute right-3 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
      </div>

      <!-- Sales Table -->
      <div class="bg-white shadow-lg rounded-lg overflow-x-auto">
        <table class="min-w-full">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sale ID</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer Name</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Attendant</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Products Sold</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Amount</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody id="salesTable" class="divide-y divide-gray-200">
            <!-- Filtered Data for Today -->
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">SALE001</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2025-08-09</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">John Doe</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Jane Smith</td>
              <td class="px-6 py-4 text-sm text-gray-900">Laptop (1), Mouse (2)</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">₦150,000.00</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">
                <a href="#" class="text-green-600 hover:text-green-800">View Details</a>
              </td>
            </tr>
            <!-- More rows can be added dynamically -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- JavaScript for Search Functionality -->
  <script>
    // Sample data for client-side filtering (filtered for today: 2025-08-09)
    const salesData = [
      { id: 'SALE001', date: '2025-08-09', customer: 'John Doe', attendant: 'Jane Smith', products: 'Laptop (1), Mouse (2)', amount: '₦150,000.00' },
    ];

    function renderTable(data) {
      const tableBody = document.getElementById('salesTable');
      tableBody.innerHTML = '';
      data.forEach(sale => {
        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-50';
        row.innerHTML = `
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${sale.id}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${sale.date}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${sale.customer}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${sale.attendant}</td>
          <td class="px-6 py-4 text-sm text-gray-900">${sale.products}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${sale.amount}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm">
            <a href="#" class="text-green-600 hover:text-green-800">View Details</a>
          </td>
        `;
        tableBody.appendChild(row);
      });
    }

    // Initial render
    renderTable(salesData);

    // Search functionality
    document.getElementById('salesSearch').addEventListener('input', function(e) {
      const searchTerm = e.target.value.toLowerCase();
      const filteredData = salesData.filter(sale =>
        sale.id.toLowerCase().includes(searchTerm) ||
        sale.customer.toLowerCase().includes(searchTerm) ||
        sale.attendant.toLowerCase().includes(searchTerm) ||
        sale.products.toLowerCase().includes(searchTerm)
      );
      renderTable(filteredData);
    });
  </script>
@endsection