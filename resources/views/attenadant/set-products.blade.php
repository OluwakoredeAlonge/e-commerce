<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce POS - Set Quick Access Products</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .product-item {
            display: flex;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid #f3f4f6;
        }
        .product-item:last-child {
            border-bottom: none;
        }
        .product-list {
            max-height: 400px;
            overflow-y: auto;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            padding: 1rem;
            background-color: white;
        }
    </style>
</head>
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
                        <li><a href="#" class="hover:underline">Orders</a></li>
                        <li><a href="#" class="hover:underline">Sales History</a></li>
                        <li><a href="#" class="hover:underline">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <main class="container mx-auto p-4 flex-grow">
            <h2 class="text-xl font-bold mb-4">Set Quick Access Products</h2>
            <p class="mb-6">Select up to 10 products to display by default in the Process Sale page for easy access.</p>

            <div class="bg-white p-6 rounded-lg shadow">
                <div id="product-list" class="product-list"></div>
                <button onclick="saveFavorites()" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Save Selection</button>
            </div>
        </main>
    </div>

    <script>
        // Expanded products data
        const products = [
            { id: 1, name: 'Laptop', price: 120000, stock: 10 },
            { id: 2, name: 'Smartphone', price: 80000, stock: 15 },
            { id: 3, name: 'Wireless Mouse', price: 5000, stock: 50 },
            { id: 4, name: 'Bluetooth Headphones', price: 15000, stock: 20 },
            { id: 5, name: 'USB-C Cable', price: 2000, stock: 100 },
            { id: 6, name: 'External Hard Drive', price: 25000, stock: 8 },
            { id: 7, name: 'Monitor', price: 45000, stock: 12 },
            { id: 8, name: 'Keyboard', price: 7000, stock: 30 },
            { id: 9, name: 'Webcam', price: 10000, stock: 25 },
            { id: 10, name: 'Portable Charger', price: 12000, stock: 40 },
            { id: 11, name: 'Tablet', price: 60000, stock: 18 },
            { id: 12, name: 'Smartwatch', price: 30000, stock: 25 },
            { id: 13, name: 'Earbuds', price: 10000, stock: 35 },
            { id: 14, name: 'Charger', price: 3000, stock: 50 },
            { id: 15, name: 'Backpack', price: 5000, stock: 40 },
            { id: 16, name: 'Notebook', price: 2000, stock: 60 },
            { id: 17, name: 'Pen', price: 500, stock: 100 },
            { id: 18, name: 'Printer', price: 20000, stock: 10 },
            { id: 19, name: 'Scanner', price: 15000, stock: 15 },
            { id: 20, name: 'Router', price: 8000, stock: 20 },
        ];

        let selected = JSON.parse(localStorage.getItem('favorites')) || [];

        function displayProducts() {
            const productList = document.getElementById('product-list');
            productList.innerHTML = '';
            products.forEach(product => {
                const item = document.createElement('div');
                item.className = 'product-item';
                item.innerHTML = `
                    <input type="checkbox" ${selected.includes(product.id) ? 'checked' : ''} onchange="toggleSelect(${product.id}, this)">
                    <span class="ml-2">${product.name} | ₦${product.price.toFixed(2)} | ${product.stock}</span>
                `;
                productList.appendChild(item);
            });
        }

        function toggleSelect(productId, checkbox) {
            if (checkbox.checked) {
                if (selected.length < 10) {
                    selected.push(productId);
                } else {
                    checkbox.checked = false;
                    alert('You can select a maximum of 10 products.');
                }
            } else {
                selected = selected.filter(id => id !== productId);
            }
        }

        function saveFavorites() {
            localStorage.setItem('favorites', JSON.stringify(selected));
            alert('Your quick access products have been saved!');
        }

        // Initial display
        displayProducts();
    </script>
</body>
</html>