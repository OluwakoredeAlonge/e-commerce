<?php

namespace App\View\Composers;

use App\Models\Product;
use Illuminate\View\View;

class ProductCountComposer
{
    public function compose(View $view)
    {
        $totalProducts = Product::count();
        $view->with('totalProducts', $totalProducts);
    }
}
