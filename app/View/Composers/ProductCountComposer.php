<?php

namespace App\View\Composers;

use App\Models\Product;
use Illuminate\View\View;

class ProductCountComposer
{
public function compose(View $view)
{
    $totalProducts = Product::count();
    $lowStockCount = Product::where('stock_quantity', '<', 10)->count();

    $view->with([
        'totalProducts' => $totalProducts,
        'lowStockCount' => $lowStockCount
    ]);
}

}
