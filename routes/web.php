<?php

use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\ProductController;
use App\Models\Accessories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\CustomerProductController;
use App\Models\Product;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

use Illuminate\Http\Request;



// // Route::get('/', function (Request $request) {
//     $query = $request->input('query');

//     // Tìm kiếm theo tất cả danh sách
//     $product = DB::table('products')->where('id', 'LIKE', "%$query%")->first();
//     $laptops = DB::table('laptops')->where('name', 'LIKE', "%$query%")->get();
//     $components = DB::table('components')->where('name', 'LIKE', "%$query%")->get();
//     $accessories = Accessories::with('color')->where('name', 'LIKE', "%$query%")->get();
//     $brands = DB::table('brands')->get();
//     $colors = DB::table('colors')->get();

//     return view('customer.home', compact('laptops', 'components', 'accessories', 'brands', 'colors','product'));
// });

Route::get('/laptop', function () {
    $products = Product::where('type', 'laptop')->get();
    return view('customer.laptop', compact('products'));
});
Route::get('/component', function () {
    $products = Product::where('type', 'component')->get();
    return view('customer.component', compact('products'));
});

Route::get('/accessories', function () {
    $products = Product::where('type', 'accessories')->get();
    return view('customer.accessories', compact('products'));

});
Route::get('/', [CustomerProductController::class, 'index'])->name('customer.home');
Route::get('/detail/{id}', [CustomerProductController::class, 'show'])->name('customer.show');



Route::get('/customerlogin', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login');
Route::get('/register', [CustomerAuthController::class, 'showRegisterForm'])->name('customer.register');
Route::post('/register', [CustomerAuthController::class, 'register'])->name('customer.registerprocess');
Route::post('/customerlogin', [CustomerAuthController::class, 'loginProcess'])->name('customer.loginprocess');
Route::get('/profile', [CustomerAuthController::class, 'showProfile'])->name('customer.profile');
Route::post('/customerlogout', [CustomerAuthController::class, 'logout'])->name('customer.logout');

Route::middleware(['customerLoginMiddleware'])->group(function () {

    Route::get('/cart', [CartController::class, 'cart'])->name('customer.cart');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('customer.addToCart');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('customer.cartUpdate');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('customer.cartRemove');
    Route::get('/remove-all', [CartController::class, 'removeAll'])->name('customer.cartRemoveAll');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('customer.updateQuantity');
    Route::post('/checkout', [CartController::class, 'processCheckout'])->name('customer.processCheckout');
});


    // Route::get('/cart', [CartController::class, 'cart'])->name('customer.cart');
    // Route::post('/cart/add', [CartController::class, 'addToCart'])->name('customer.addToCart');
    // Route::post('/cart/update', [CartController::class, 'updateCart'])->name('customer.cartUpdate');
    // Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('customer.cartRemove');
    // Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    // Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('customer.updateQuantity');

Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/login', [AdminController::class, 'LoginProcess'])->name('admin.LoginProcess');
Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::middleware(['adminLoginMiddleware'])->prefix('admin')->group(function () {
    Route::prefix('admins')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/{admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('/{admin}/edit', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');
    });

    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
    });
    Route::prefix('brand')->group(function(){
        Route::get('/', [BrandController::class, 'index'])->name('brand.index');
        Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/{brand}/edit', [BrandController::class, 'edit'])->name('brand.edit');
        Route::put('/{brand}/edit', [BrandController::class, 'update'])->name('brand.update');
        Route::delete('/{brand}', [BrandController::class, 'destroy'])->name('brand.destroy');
    });
    Route::prefix('laptop')->group(function(){
        Route::get('/', [LaptopController::class, 'index'])->name('laptop.index');
        Route::get('/create', [LaptopController::class, 'create'])->name('laptop.create');
        Route::post('/store', [LaptopController::class, 'store'])->name('laptop.store');
        Route::get('/{laptop}/edit', [LaptopController::class, 'edit'])->name('laptop.edit');
        Route::put('/{laptop}/edit', [LaptopController::class, 'update'])->name('laptop.update');
        Route::delete('/{laptop}', [LaptopController::class, 'destroy'])->name('laptop.destroy');
    });
    Route::prefix('manage')->group(function(){
        Route::get('/', [ManageController::class, 'index'])->name('manage.index');
    });
    Route::prefix('component')->group(function(){
        Route::get('/', [ComponentController::class, 'index'])->name('component.index');
        Route::get('/create', [ComponentController::class, 'create'])->name('component.create');
        Route::post('/store', [ComponentController::class, 'store'])->name('component.store');
        Route::get('/{component}/edit', [ComponentController::class, 'edit'])->name('component.edit');
        Route::put('/{component}/edit', [ComponentController::class, 'update'])->name('component.update');
        Route::delete('/{component}', [ComponentController::class, 'destroy'])->name('component.destroy');
    });
    Route::prefix('accessories')->group(function(){
        Route::get('/', [AccessoriesController::class, 'index'])->name('accessories.index');
        Route::get('/create', [AccessoriesController::class, 'create'])->name('accessories.create');
        Route::post('/store', [AccessoriesController::class, 'store'])->name('accessories.store');
        Route::get('/{accessories}/edit', [AccessoriesController::class, 'edit'])->name('accessories.edit');
        Route::put('/{accessories}/edit', [AccessoriesController::class, 'update'])->name('accessories.update');
        Route::delete('/{accessories}', [AccessoriesController::class, 'destroy'])->name('accessories.destroy');
    });
    Route::prefix('color')->group(function(){
        Route::get('/', [ColorController::class, 'index'])->name('color.index');
        Route::get('/create', [ColorController::class, 'create'])->name('color.create');
        Route::post('/store', [ColorController::class, 'store'])->name('color.store');
        Route::get('/{color}/edit', [ColorController::class, 'edit'])->name('color.edit');
        Route::put('/{color}/edit', [ColorController::class, 'update'])->name('color.update');
        Route::delete('/{color}', [ColorController::class, 'destroy'])->name('color.destroy');
    });
    Route::prefix('employees')->group(function (){
        Route::get('/',[EmployeesController::class, 'index'])->name('employees.index');
        Route::get('/create',[EmployeesController::class, 'create'])->name('employees.create');
        Route::post('/store', [EmployeesController::class, 'store'])->name('employees.store');
        Route::get('/{employees}/edit', [EmployeesController::class, 'edit'])->name('employees.edit');
        Route::put('/{employees}/edit', [EmployeesController::class, 'update'])->name('employees.update');
        Route::delete('/{employees}', [EmployeesController::class, 'destroy'])->name('employees.destroy');
    });
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::get('/detail/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/{product}/edit', [ProductController::class, 'update'])->name('product.update');
    });
    Route::prefix('orders')->group(function(){

            Route::get('/', [OrderController::class, 'index'])->name('order.index');
            Route::put('/{id}/update-payment-method', [OrderController::class, 'updatePaymentMethod'])->name('orders.updatePaymentMethod');

    });
});
