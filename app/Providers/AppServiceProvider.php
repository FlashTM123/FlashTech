<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Product;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    // View::composer(['customer.product_detail', 'components.card-laptop'], function ($view) {
    //     if ($view->getData()['product'] ?? false) {
    //         $view->with('product', Product::find($view->getData()['product']->id));
    //     }
    // });
}

}
