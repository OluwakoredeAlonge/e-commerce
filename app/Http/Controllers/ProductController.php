<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Loads all products with their category via eager loading
     * and passes them to the admin.products view.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        // Eager load category relationship to reduce queries
        $products = Product::with('category')->orderBy('created_at', 'ASC')->paginate(50);
        // Pass products data to the view
        return view('admin.products', compact('products'));
    }
    /**
     * Display the form to create a new product.
     *
     * @return \Illuminate\Http\Response
     */
      public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.add-product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * Validates the input via the ValidateRequest and
     * creates a new Product model instance with the validated
     * data. Redirects to the products index page with a success
     * message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
{
    //   dd($request->all());
    $validated = $request->validate([
        'product_name'   => 'required|string|max:255',
        'category_id'    => 'required|exists:categories,id',
        'price'          => 'required|numeric|min:0',
        'stock_quantity' => 'required|integer|min:0',
        'description'    => 'nullable|string',
    ]);

    Product::create([
        'product_name'   => $validated['product_name'],
        'category_id'    => $validated['category_id'],
        'price'          => $validated['price'],
        'stock_quantity' => $validated['stock_quantity'],
        'description'    => $validated['description'] ?? null,
    ]);

    return redirect()->route('products.index')->with('success', 'Product added successfully!');
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
public function edit(Product $product)
{
    // Load all categories for the dropdown
    $categories = Category::all();

    // Pass the existing product + categories to the view
    return view('admin.add-product', compact('product', 'categories'));
}
public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'product_name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'stock_quantity' => 'required|integer|min:0',
        'description' => 'nullable|string',
    ]);

    $product->update($validated);

    return redirect()->route('products.index')->with('success', 'Product updated successfully!');
}
public function destroy(Product $product)
{
    $product->delete();

    return redirect()
        ->route('products.index')
        ->with('success', 'Product deleted successfully!');
}
public function show(Product $product)
{
    // Eager load the category if needed
    $product->load('category');

    return view('admin.product-details', compact('product'));
}
  public function lowStock()
    {
        // Define your low stock threshold
        $threshold = 10;

        // Fetch products with quantity below the threshold
        $lowStockProducts = Product::with('category')->where('stock_quantity', '<', $threshold)->paginate(20);

        // Pass them to the view
        return view('admin.low-stock-products', compact('lowStockProducts'));
    }
}
