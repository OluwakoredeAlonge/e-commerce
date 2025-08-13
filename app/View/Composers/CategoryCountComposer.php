<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryCountComposer
{
    public function compose(View $view)
    {
        $totalCategories = Category::count();
        $view->with('totalCategories', $totalCategories);
    }
}
