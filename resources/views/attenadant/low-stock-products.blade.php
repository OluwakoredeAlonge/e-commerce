<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Low Stock Products - E-Commerce POS</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
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
            <li><a href="low-stock-products.html" class="hover:underline font-semibold">Low Stock</a></li>
            <li><a href="sales-history.html" class="hover:underline">Sales History</a></li>
            <li><a href="logout" class="hover:underline">Logout</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto p-4 flex-grow">
      <h1 class="text-3xl font-bold text-gray-800 mb-6">Low Stock Products</h1>
      <p class="mb-4 text-gray-600">Displaying all products with less than 10 units in stock.</p>

      <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
        <div class="flex flex-col sm:flex-row gap-4 mb-4">
          <!-- Search -->
          <div class="flex-1">
            <div class="relative">
              <input
                type="text"
                id="product-search"
                placeholder="Search products..."
                class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
              >
              <svg class="absolute left-3 top-3 h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
          </div>
          <!-- Category Filter -->
          <div class="flex-1">
            <select
              id="category-filter"
              class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
            >
              <option value="">All Categories</option>
            </select>
          </div>
        </div>

        <!-- Products Table -->
        <div class="overflow-x-auto">
          <table class="w-full table-auto">
            <thead>
              <tr class="bg-gray-100 text-gray-700">
                <th class="px-4 py-2 text-left">Product Name</th>
                <th class="px-4 py-2 text-left">Category</th>
                <th class="px-4 py-2 text-left">Price (₦)</th>
                <th class="px-4 py-2 text-left">Stock</th>
              </tr>
            </thead>
            <tbody id="product-table" class="text-gray-600">
              <!-- Low stock products populated by JavaScript -->
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

  <script>
    let products = [];
    let categories = [];

    async function fetchProducts() {
      products = [
        { id: 1, name: 'Smartphone X', category: 'Electronics', price: 59999, stock_quantity: 20 },
        { id: 2, name: 'Laptop Pro', category: 'Electronics', price: 129999, stock_quantity: 15 },
        { id: 3, name: 'Headphones', category: 'Accessories', price: 9999, stock_quantity: 5 },
        { id: 4, name: 'Smartwatch', category: 'Accessories', price: 19999, stock_quantity: 0 },
        { id: 5, name: 'T-Shirt', category: 'Clothing', price: 2999, stock_quantity: 8 },
      ];

      // Filter only low stock items
      products = products.filter(p => p.stock_quantity < 10);

      categories = [...new Set(products.map(p => p.category))];
      renderCategoryFilter();
      renderProductTable(products);
    }

    function renderCategoryFilter() {
      const categoryFilter = document.getElementById('category-filter');
      categoryFilter.innerHTML = `
        <option value="">All Categories</option>
        ${categories.map(c => `<option value="${c}">${c}</option>`).join('')}
      `;
    }

    function renderProductTable(list) {
      const productTable = document.getElementById('product-table');
      productTable.innerHTML = list.length === 0
        ? `<tr><td colspan="4" class="px-4 py-2 text-center text-gray-500">No low stock products found</td></tr>`
        : list.map(p => `
          <tr class="text-red-600">
            <td class="px-4 py-2">${p.name}</td>
            <td class="px-4 py-2">${p.category}</td>
            <td class="px-4 py-2">₦${p.price.toLocaleString()}</td>
            <td class="px-4 py-2">${p.stock_quantity}</td>
          </tr>
        `).join('');
    }

    document.getElementById('product-search').addEventListener('input', (e) => {
      const q = e.target.value.toLowerCase();
      const c = document.getElementById('category-filter').value;
      filterProducts(q, c);
    });

    document.getElementById('category-filter').addEventListener('change', (e) => {
      const c = e.target.value;
      const q = document.getElementById('product-search').value.toLowerCase();
      filterProducts(q, c);
    });

    function filterProducts(query, category) {
      let filtered = products;
      if (query) filtered = filtered.filter(p => p.name.toLowerCase().includes(query));
      if (category) filtered = filtered.filter(p => p.category === category);
      renderProductTable(filtered);
    }

    window.onload = fetchProducts;
  </script>
</body>
</html>
