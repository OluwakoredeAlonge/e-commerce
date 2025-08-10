<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders - E-Commerce POS</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 font-sans" x-data="orderFilter()">

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
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex justify-between items-center mb-6">
      <div>
        <h2 class="text-2xl font-bold text-gray-800">Orders</h2>
        <p class="text-sm text-gray-500">View and manage all customer orders with detailed product information.</p>
      </div>
      <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center space-x-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
        </svg>
        <span>Export as CSV</span>
      </button>
    </div>

    <!-- Summary Card -->
    <div class="bg-white shadow-lg rounded-lg p-6 mb-6 border-l-4 border-blue-500">
      <div class="flex items-center space-x-4">
        <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
        </svg>
        <div>
          <h3 class="text-lg font-semibold text-gray-800">Total Orders (<span x-text="filterLabel"></span>)</h3>
          <p class="text-2xl font-bold text-gray-900" x-text="totalOrders"></p>
          <p class="text-sm text-gray-500" x-text="ordersDescription"></p>
        </div>
      </div>
      <div class="mt-4">
        <a href="sales.html" class="text-blue-600 hover:text-blue-800 font-medium">View Sales History</a>
      </div>
    </div>

    <!-- Filters and Search -->
    <div class="mb-6 flex flex-col md:flex-row gap-4">
      <div class="relative flex-1">
        <input type="text" id="orderSearch" x-model="searchTerm" placeholder="Search by customer or order ID..." class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <svg class="w-5 h-5 absolute right-3 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
      </div>
      <div class="flex flex-col gap-2">
        <div class="flex space-x-2">
          <button :class="{'bg-blue-600 text-white': filterType === '7days', 'bg-gray-200 text-gray-700': filterType !== '7days'}" @click="setFilter('7days')" class="px-4 py-2 rounded-lg hover:bg-blue-700 hover:text-white">Last 7 Days</button>
          <button :class="{'bg-blue-600 text-white': filterType === '30days', 'bg-gray-200 text-gray-700': filterType !== '30days'}" @click="setFilter('30days')" class="px-4 py-2 rounded-lg hover:bg-blue-700 hover:text-white">Last 30 Days</button>
          <button :class="{'bg-blue-600 text-white': filterType === 'custom', 'bg-gray-200 text-gray-700': filterType !== 'custom'}" @click="setFilter('custom')" class="px-4 py-2 rounded-lg hover:bg-blue-700 hover:text-white">Custom Range</button>
        </div>
        <div x-show="filterType === 'custom'" class="flex space-x-2">
          <input type="date" x-model="customStartDate" class="p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          <input type="date" x-model="customEndDate" class="p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          <button @click="applyCustomFilter" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Apply</button>
        </div>
      </div>
    </div>

    <!-- Orders Table -->
    <div class="bg-white shadow-lg rounded-lg overflow-x-auto">
      <table class="min-w-full">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Amount</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
          </tr>
        </thead>
        <tbody id="orderTable" class="divide-y divide-gray-200">
          <template x-for="order in filteredOrders" :key="order.id">
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" x-text="order.id"></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" x-text="order.date"></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" x-text="order.customer"></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" x-text="order.totalAmount"></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">
                <button class="view-details text-blue-600 hover:text-blue-800" :data-order-id="order.id">View Details</button>
              </td>
            </tr>
          </template>
        </tbody>
      </table>
    </div>

    <!-- Modal -->
    <div id="orderModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
      <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl">
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-xl font-bold text-gray-800">Order Details</h3>
          <button id="closeModal" class="text-gray-500 hover:text-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
        <div id="modalContent" class="space-y-4"></div>
      </div>
    </div>
  </div>

  <!-- JS Logic (same as original) -->
  <script>
    document.addEventListener('alpine:init', () => {
      Alpine.data('orderFilter', () => ({
        searchTerm: '',
        filterType: '7days',
        customStartDate: '',
        customEndDate: '',
        orderData: [
          {
            id: 'ORDER001',
            date: '2025-08-09',
            customer: 'John Doe',
            products: [
              { name: 'Laptop', quantity: 1, unitPrice: '₦1,500,000.00', totalPrice: '₦1,500,000.00' },
              { name: 'Mouse', quantity: 2, unitPrice: '₦45,000.00', totalPrice: '₦90,000.00' }
            ],
            totalAmount: '₦1,590,000.00'
          },
          {
            id: 'ORDER002',
            date: '2025-08-08',
            customer: 'Mary Johnson',
            products: [
              { name: 'Headphones', quantity: 1, unitPrice: '₦25,000.00', totalPrice: '₦25,000.00' }
            ],
            totalAmount: '₦25,000.00'
          },
          {
            id: 'ORDER003',
            date: '2025-08-09',
            customer: 'Alice blue',
            products: [
              { name: 'USB-C Cable', quantity: 2, unitPrice: '₦22,500.00', totalPrice: '₦45,000.00' }
            ],
            totalAmount: '₦45,000.00'
          },
          {
            id: 'ORDER004',
            date: '2025-07-15',
            customer: 'Bob Smith',
            products: [
              { name: 'Keyboard', quantity: 1, unitPrice: '₦50,000.00', totalPrice: '₦50,000.00' }
            ],
            totalAmount: '₦50,000.00'
          }
        ],
        get filteredOrders() {
          let startDate, endDate;
          const today = new Date('2025-08-09');

          if (this.filterType === '7days') {
            startDate = new Date(today);
            startDate.setDate(today.getDate() - 7); // August 2, 2025
            endDate = today;
          } else if (this.filterType === '30days') {
            startDate = new Date(today);
            startDate.setDate(today.getDate() - 30); // July 10, 2025
            endDate = today;
          } else if (this.filterType === 'custom' && this.customStartDate && this.customEndDate) {
            startDate = new Date(this.customStartDate);
            endDate = new Date(this.customEndDate);
          } else {
            return this.orderData; // Show all if no valid custom range
          }

          return this.orderData.filter(order => {
            const orderDate = new Date(order.date);
            const matchesSearch = !this.searchTerm ||
              order.id.toLowerCase().includes(this.searchTerm.toLowerCase()) ||
              order.customer.toLowerCase().includes(this.searchTerm.toLowerCase());
            return matchesSearch && orderDate >= startDate && orderDate <= endDate;
          });
        },
        get totalOrders() {
          return this.filteredOrders.length;
        },
        get filterLabel() {
          if (this.filterType === '7days') return 'Last 7 Days';
          if (this.filterType === '30days') return 'Last 30 Days';
          return 'Custom Range';
        },
        get ordersDescription() {
          if (this.filterType === '7days') return 'Number of orders placed between August 2 - August 9, 2025';
          if (this.filterType === '30days') return 'Number of orders placed between July 10 - August 9, 2025';
          if (this.customStartDate && this.customEndDate) {
            return `Number of orders placed between ${this.customStartDate} - ${this.customEndDate}`;
          }
          return 'Number of orders in selected range';
        },
        setFilter(type) {
          this.filterType = type;
          if (type !== 'custom') {
            this.customStartDate = '';
            this.customEndDate = '';
          }
        },
        applyCustomFilter() {
          if (this.customStartDate && this.customEndDate) {
            this.filterType = 'custom';
          }
        }
      }));
    });

    // Modal handling (plain JavaScript for consistency with sales-history.html)
    function showModal(orderId) {
      const orderData = [
        {
          id: 'ORDER001',
          date: '2025-08-09',
          customer: 'John Doe',
          products: [
            { name: 'Laptop', quantity: 1, unitPrice: '₦1,500,000.00', totalPrice: '₦1,500,000.00' },
            { name: 'Mouse', quantity: 2, unitPrice: '₦45,000.00', totalPrice: '₦90,000.00' }
          ],
          totalAmount: '₦1,590,000.00'
        },
        {
          id: 'ORDER002',
          date: '2025-08-08',
          customer: 'Mary Johnson',
          products: [
            { name: 'Headphones', quantity: 1, unitPrice: '₦25,000.00', totalPrice: '₦25,000.00' }
          ],
          totalAmount: '₦25,000.00'
        },
        {
          id: 'ORDER003',
          date: '2025-08-09',
          customer: 'Alice blue',
          products: [
            { name: 'USB-C Cable', quantity: 2, unitPrice: '₦22,500.00', totalPrice: '₦45,000.00' }
          ],
          totalAmount: '₦45,000.00'
        },
        {
          id: 'ORDER004',
          date: '2025-07-15',
          customer: 'Bob Smith',
          products: [
            { name: 'Keyboard', quantity: 1, unitPrice: '₦50,000.00', totalPrice: '₦50,000.00' }
          ],
          totalAmount: '₦50,000.00'
        }
      ];
      const order = orderData.find(o => o.id === orderId);
      if (!order) return;

      const modalContent = document.getElementById('modalContent');
      modalContent.innerHTML = `
        <p><strong>Order ID:</strong> ${order.id}</p>
        <p><strong>Date:</strong> ${order.date}</p>
        <p><strong>Customer Name:</strong> ${order.customer}</p>
        <p><strong>Total Amount:</strong> ${order.totalAmount}</p>
        <h4 class="text-lg font-semibold text-gray-800 mt-4">Products</h4>
        <table class="min-w-full border-t border-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Price</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Price</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            ${order.products.map(product => `
              <tr>
                <td class="px-4 py-2 text-sm text-gray-900">${product.name}</td>
                <td class="px-4 py-2 text-sm text-gray-900">${product.quantity}</td>
                <td class="px-4 py-2 text-sm text-gray-900">${product.unitPrice}</td>
                <td class="px-4 py-2 text-sm text-gray-900">${product.totalPrice}</td>
              </tr>
            `).join('')}
          </tbody>
        </table>
      `;
      document.getElementById('orderModal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('orderModal').classList.add('hidden');
    }

    // View Details button event listeners
    document.addEventListener('click', function(e) {
      if (e.target.classList.contains('view-details')) {
        const orderId = e.target.getAttribute('data-order-id');
        showModal(orderId);
      }
    });

    // Close modal
    document.getElementById('closeModal').addEventListener('click', closeModal);

    // Close modal when clicking outside
    document.getElementById('orderModal').addEventListener('click', function(e) {
      if (e.target === this) closeModal();
    });
  </script>
</body>
</html>
