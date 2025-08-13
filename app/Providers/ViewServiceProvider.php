<?php

namespace App\Providers;

use App\View\Composers\CategoryCountComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\ProductCountComposer;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Bind composer to all views or specific views
        View::composer('*', ProductCountComposer::class);
        View::composer('*', CategoryCountComposer::class);
    }
}
