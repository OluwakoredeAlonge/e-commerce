<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sales History - E-Commerce POS</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://unpkg.com/heroicons@2.0.18/dist/heroicons.min.js"></script>
  <link href="https://unpkg.com/heroicons@2.0.18/dist/heroicons.css" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 font-sans" x-data="salesFilter()">
  <div class="flex flex-col min-h-screen">
    
    <!-- Blue Navbar -->
    <header class="bg-blue-500 text-white p-4">
      <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold">E-Commerce POS</h1>
        <nav>
          <ul class="flex space-x-4">
            <li><a href="attendant.html" class="hover:underline">Dashboard</a></li>
            <li><a href="process-sale.html" class="hover:underline">Process Sale</a></li>
            <li><a href="products.html" class="hover:underline">Products</a></li>
            <li><a href="orders.html" class="hover:underline">Orders</a></li>
            <li><a href="sales-history.html" class="hover:underline font-semibold">Sales History</a></li>
            <li><a href="logout" class="hover:underline">Logout</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto p-6 flex-grow">
      <div class="flex justify-between items-center mb-6">
        <div>
          <h2 class="text-2xl font-bold text-gray-800">Sales History</h2>
          <p class="text-sm text-gray-500">Track all sales transactions and revenue with detailed product information in details view.</p>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center space-x-2">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
          <span>Export as CSV</span>
        </button>
      </div>

      <!-- Summary Card -->
      <div class="bg-white shadow-lg rounded-lg p-6 mb-6 border-l-4 border-blue-500">
        <div class="flex items-center space-x-4">
          <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
          <div>
            <h3 class="text-lg font-semibold text-gray-800">Total Revenue (<span x-text="filterLabel"></span>)</h3>
            <p class="text-2xl font-bold text-gray-900" x-text="totalRevenue"></p>
            <p class="text-sm text-gray-500" x-text="revenueDescription"></p>
          </div>
        </div>
      </div>

      <!-- Filters and Search -->
      <div class="mb-6 flex flex-col md:flex-row gap-4">
        <div class="relative flex-1">
          <input type="text" id="salesSearch" x-model="searchTerm" placeholder="Search by customer or sale ID..." class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          <svg class="w-5 h-5 absolute right-3 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
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

      <!-- Sales Table -->
      <div class="bg-white shadow-lg rounded-lg overflow-x-auto">
        <table class="min-w-full">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sale ID</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer Name</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Attendant</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Amount</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody id="salesTable" class="divide-y divide-gray-200">
            <template x-for="sale in filteredSales" :key="sale.id">
              <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" x-text="sale.id"></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" x-text="sale.date"></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" x-text="sale.customer"></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" x-text="sale.attendant"></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" x-text="sale.totalAmount"></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                  <button class="view-details text-blue-600 hover:text-blue-800" :data-sale-id="sale.id">View Details</button>
                </td>
              </tr>
            </template>
          </tbody>
        </table>
      </div>

      <!-- Modal -->
      <div id="saleModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-800">Sale Details</h3>
            <button id="closeModal" class="text-gray-500 hover:text-gray-700">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
          </div>
          <div id="modalContent" class="space-y-4"></div>
        </div>
      </div>
    </main>
  </div>

  <!-- Original JS Logic -->
  <script>
    document.addEventListener('alpine:init', () => {
      Alpine.data('salesFilter', () => ({
        searchTerm: '',
        filterType: '7days',
        customStartDate: '',
        customEndDate: '',
        saleData: [
          { id: 'SALE001', date: '2025-08-09', customer: 'John Doe', attendant: 'Jane Smith', products: [
              { name: 'Laptop', quantity: 1, unitPrice: '₦1,500,000.00', totalPrice: '₦1,500,000.00' },
              { name: 'Mouse', quantity: 2, unitPrice: '₦45,000.00', totalPrice: '₦90,000.00' }
            ], totalAmount: '₦1,590,000.00'
          },
          { id: 'SALE002', date: '2025-08-08', customer: 'Mary Johnson', attendant: 'John Brown', products: [
              { name: 'Headphones', quantity: 1, unitPrice: '₦25,000.00', totalPrice: '₦25,000.00' }
            ], totalAmount: '₦25,000.00'
          },
          { id: 'SALE003', date: '2025-07-15', customer: 'Alice Green', attendant: 'Emma White', products: [
              { name: 'USB-C Cable', quantity: 2, unitPrice: '₦22,500.00', totalPrice: '₦45,000.00' }
            ], totalAmount: '₦45,000.00'
          }
        ],
        get filteredSales() {
          let startDate, endDate;
          const today = new Date('2025-08-09');
          if (this.filterType === '7days') { startDate = new Date(today); startDate.setDate(today.getDate() - 7); endDate = today; }
          else if (this.filterType === '30days') { startDate = new Date(today); startDate.setDate(today.getDate() - 30); endDate = today; }
          else if (this.filterType === 'custom' && this.customStartDate && this.customEndDate) { startDate = new Date(this.customStartDate); endDate = new Date(this.customEndDate); }
          else return this.saleData;
          return this.saleData.filter(sale => {
            const saleDate = new Date(sale.date);
            const matchesSearch = !this.searchTerm || sale.id.toLowerCase().includes(this.searchTerm.toLowerCase()) || sale.customer.toLowerCase().includes(this.searchTerm.toLowerCase());
            return matchesSearch && saleDate >= startDate && saleDate <= endDate;
          });
        },
        get totalRevenue() {
          const total = this.filteredSales.reduce((sum, sale) => sum + parseFloat(sale.totalAmount.replace('₦', '').replace(/,/g, '')), 0);
          return `₦${total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
        },
        get filterLabel() {
          if (this.filterType === '7days') return 'Last 7 Days';
          if (this.filterType === '30days') return 'Last 30 Days';
          return 'Custom Range';
        },
        get revenueDescription() {
          if (this.filterType === '7days') return 'Revenue from sales between August 2 - August 9, 2025';
          if (this.filterType === '30days') return 'Revenue from sales between July 10 - August 9, 2025';
          if (this.customStartDate && this.customEndDate) return `Revenue from sales between ${this.customStartDate} - ${this.customEndDate}`;
          return 'Revenue from sales in selected range';
        },
        setFilter(type) {
          this.filterType = type;
          if (type !== 'custom') { this.customStartDate = ''; this.customEndDate = ''; }
        },
        applyCustomFilter() {
          if (this.customStartDate && this.customEndDate) this.filterType = 'custom';
        }
      }));
    });

    function showModal(saleId) {
      const saleData = [
        { id: 'SALE001', date: '2025-08-09', customer: 'John Doe', attendant: 'Jane Smith', products: [
            { name: 'Laptop', quantity: 1, unitPrice: '₦1,500,000.00', totalPrice: '₦1,500,000.00' },
            { name: 'Mouse', quantity: 2, unitPrice: '₦45,000.00', totalPrice: '₦90,000.00' }
          ], totalAmount: '₦1,590,000.00'
        },
        { id: 'SALE002', date: '2025-08-08', customer: 'Mary Johnson', attendant: 'John Brown', products: [
            { name: 'Headphones', quantity: 1, unitPrice: '₦25,000.00', totalPrice: '₦25,000.00' }
          ], totalAmount: '₦25,000.00'
        },
        { id: 'SALE003', date: '2025-07-15', customer: 'Alice Green', attendant: 'Emma White', products: [
            { name: 'USB-C Cable', quantity: 2, unitPrice: '₦22,500.00', totalPrice: '₦45,000.00' }
          ], totalAmount: '₦45,000.00'
        }
      ];
      const sale = saleData.find(s => s.id === saleId);
      if (!sale) return;
      const modalContent = document.getElementById('modalContent');
      modalContent.innerHTML = `
        <p><strong>Sale ID:</strong> ${sale.id}</p>
        <p><strong>Date:</strong> ${sale.date}</p>
        <p><strong>Customer Name:</strong> ${sale.customer}</p>
        <p><strong>Attendant:</strong> ${sale.attendant}</p>
        <p><strong>Total Amount:</strong> ${sale.totalAmount}</p>
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
            ${sale.products.map(p => `
              <tr>
                <td class="px-4 py-2 text-sm text-gray-900">${p.name}</td>
                <td class="px-4 py-2 text-sm text-gray-900">${p.quantity}</td>
                <td class="px-4 py-2 text-sm text-gray-900">${p.unitPrice}</td>
                <td class="px-4 py-2 text-sm text-gray-900">${p.totalPrice}</td>
              </tr>
            `).join('')}
          </tbody>
        </table>
      `;
      document.getElementById('saleModal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('saleModal').classList.add('hidden');
    }

    document.addEventListener('click', e => {
      if (e.target.classList.contains('view-details')) {
        const saleId = e.target.getAttribute('data-sale-id');
        showModal(saleId);
      }
    });
    document.getElementById('closeModal').addEventListener('click', closeModal);
    document.getElementById('saleModal').addEventListener('click', e => { if (e.target === e.currentTarget) closeModal(); });
  </script>
</body>
</html>
