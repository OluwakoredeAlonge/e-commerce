<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce POS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles to improve UI without changing color scheme */
        .product-list {
            max-height: 300px;
            overflow-y: auto;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            padding: 1rem;
            background-color: white;
        }
        .product-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid #f3f4f6;
        }
        .product-item:last-child {
            border-bottom: none;
        }
        .qty-control {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .qty-input {
            width: 3rem;
            text-align: center;
        }
        .cart-table th, .cart-table td {
            padding: 0.75rem;
            text-align: left;
        }
        .cart-table {
            width: 100%;
            border-collapse: collapse;
        }
        .cart-table th {
            background-color: #f9fafb;
        }
        .summary-box {
            background-color: #f9fafb;
            padding: 1rem;
            border-radius: 0.5rem;
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
            <h2 class="text-xl font-bold mb-4">Process Sale</h2>
            <p class="mb-6">Start a new sale transaction</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Select Products -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Select Products</h3>
                    <div class="flex mb-4">
                        <input type="text" id="product-search" placeholder="Search products..." class="flex-grow p-2 border rounded-l">
                        <button onclick="searchProducts()" class="bg-blue-500 text-white px-4 py-2 rounded-r">Search</button>
                    </div>
                    <p class="mb-4">Select products to add to the cart</p>
                    <div id="product-list" class="product-list"></div>
                </div>

                <!-- Cart -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Cart</h3>
                    <table id="cart-table" class="cart-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="cart-body">
                            <tr>
                                <td colspan="5" class="text-center">Cart is empty</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="mt-4">Manage items in the cart</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <!-- Customer -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Customer</h3>
                    <div class="flex mb-4">
                        <input type="text" id="customer-name" placeholder="Enter customer name..." class="flex-grow p-2 border rounded-l">
                        <button onclick="setCustomer()" class="bg-blue-500 text-white px-4 py-2 rounded-r">Set</button>
                    </div>
                    <p>Set customer name for the sale</p>
                </div>

                <!-- Summary -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Summary</h3>
                    <div class="summary-box space-y-2">
                        <div class="flex justify-between">
                            <span>Customer</span>
                            <span id="summary-customer">No customer selected</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span id="summary-subtotal">₦0.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Tax (0%)</span>
                            <span id="summary-tax">₦0.00</span>
                        </div>
                        <div class="flex justify-between font-bold">
                            <span>Total</span>
                            <span id="summary-total">₦0.00</span>
                        </div>
                    </div>
                    <button onclick="checkout()" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 w-full">Checkout</button>
                    <p class="mt-4 text-center">Complete the sale</p>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Expanded products data with name, price, and stock quantity
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

        let cart = [];
        let customer = null;

        // Display products with name | price | stock format
        function displayProducts(filteredProducts) {
            const productList = document.getElementById('product-list');
            productList.innerHTML = '';
            filteredProducts.forEach(product => {
                const item = document.createElement('div');
                item.className = 'product-item';
                item.innerHTML = `
                    <span>${product.name} | ₦${product.price.toFixed(2)} | ${product.stock}</span>
                    <button onclick="addToCart(${product.id})" class="bg-blue-500 text-white px-2 py-1 rounded" ${product.stock === 0 ? 'disabled' : ''}>Add</button>
                `;
                productList.appendChild(item);
            });
        }

        // Initial display with favorites if set
        const favorites = JSON.parse(localStorage.getItem('favorites')) || [];
        let initialProducts = favorites.length > 0 ? products.filter(p => favorites.includes(p.id)) : products;
        displayProducts(initialProducts);

        // Search products from all
        function searchProducts() {
            const query = document.getElementById('product-search').value.toLowerCase();
            const filtered = products.filter(p => p.name.toLowerCase().includes(query));
            displayProducts(filtered);
        }

        // Add to cart
        function addToCart(productId) {
            const product = products.find(p => p.id === productId);
            if (product && product.stock > 0) {
                const existingItem = cart.find(item => item.id === productId);
                if (existingItem) {
                    if (existingItem.quantity < product.stock) {
                        existingItem.quantity += 1;
                        product.stock -= 1;
                    } else {
                        alert(`Cannot add more ${product.name}. Only ${product.stock} in stock.`);
                    }
                } else {
                    cart.push({ ...product, quantity: 1 });
                    product.stock -= 1;
                }
                updateCart();
                displayProducts(document.getElementById('product-search').value ? products.filter(p => p.name.toLowerCase().includes(document.getElementById('product-search').value.toLowerCase())) : initialProducts);
            } else {
                alert('Product out of stock!');
            }
        }

        // Update cart table
        function updateCart() {
            const cartBody = document.getElementById('cart-body');
            cartBody.innerHTML = '';
            if (cart.length === 0) {
                cartBody.innerHTML = '<tr><td colspan="5" class="text-center">Cart is empty</td></tr>';
            } else {
                cart.forEach(item => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${item.name}</td>
                        <td>₦${item.price.toFixed(2)}</td>
                        <td>
                            <div class="qty-control">
                                <button onclick="updateQuantity(${item.id}, -1)" class="bg-gray-300 px-2 py-1 rounded">-</button>
                                <input type="text" value="${item.quantity}" class="qty-input" readonly>
                                <button onclick="updateQuantity(${item.id}, 1)" class="bg-gray-300 px-2 py-1 rounded">+</button>
                            </div>
                        </td>
                        <td>₦${(item.price * item.quantity).toFixed(2)}</td>
                        <td><button onclick="removeFromCart(${item.id})" class="text-red-500">Remove</button></td>
                    `;
                    cartBody.appendChild(row);
                });
            }
            updateSummary();
        }

        // Update quantity
        function updateQuantity(productId, change) {
            const item = cart.find(i => i.id === productId);
            const product = products.find(p => p.id === productId);
            if (item) {
                if (change > 0 && (item.quantity + change) > (item.quantity + product.stock)) {
                    alert(`Cannot add more ${item.name}. Only ${product.stock} left in stock.`);
                    return;
                }
                item.quantity += change;
                product.stock -= change;
                if (item.quantity <= 0) {
                    removeFromCart(productId);
                } else {
                    updateCart();
                }
                displayProducts(document.getElementById('product-search').value ? products.filter(p => p.name.toLowerCase().includes(document.getElementById('product-search').value.toLowerCase())) : initialProducts);
            }
        }

        // Remove from cart
        function removeFromCart(productId) {
            const item = cart.find(i => i.id === productId);
            if (item) {
                const product = products.find(p => p.id === productId);
                product.stock += item.quantity;
                cart = cart.filter(i => i.id !== productId);
                updateCart();
                displayProducts(document.getElementById('product-search').value ? products.filter(p => p.name.toLowerCase().includes(document.getElementById('product-search').value.toLowerCase())) : initialProducts);
            }
        }

        // Update summary
        function updateSummary() {
            const subtotal = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
            const tax = 0; // 0% tax
            const total = subtotal + tax;

            document.getElementById('summary-subtotal').textContent = `₦${subtotal.toFixed(2)}`;
            document.getElementById('summary-tax').textContent = `₦${tax.toFixed(2)}`;
            document.getElementById('summary-total').textContent = `₦${total.toFixed(2)}`;
        }

        // Set customer
        function setCustomer() {
            const name = document.getElementById('customer-name').value.trim();
            customer = name || null;
            document.getElementById('summary-customer').textContent = customer || 'No customer selected';
        }

        // Checkout
        function checkout() {
            if (cart.length === 0) {
                alert('Cart is empty!');
                return;
            }
            alert(`Sale completed for ${customer || 'No customer'} with total ₦${document.getElementById('summary-total').textContent}`);
            // Reset
            cart = [];
            customer = null;
            document.getElementById('customer-name').value = '';
            document.getElementById('summary-customer').textContent = 'No customer selected';
            updateCart();
            displayProducts(initialProducts);
        }
    </script>
</body>
</html>