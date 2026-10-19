<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Finance\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Finance\CustomerController;
use App\Http\Controllers\Finance\SupplierController;
use App\Http\Controllers\Finance\ExpenseCategoryController;
use App\Http\Controllers\Finance\ExpenseController;
use App\Http\Controllers\Finance\SaleController;
use App\Http\Controllers\Finance\PurchaseController;
use App\Http\Controllers\Finance\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;




Route::get('/', [WelcomeController::class, 'index']);
Route::get('/product-details-{id}',[WelcomeController::class, 'details']);
Route::get('/about',[WelcomeController::class, 'about']);

// Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

//search
Route::post('/search',[WelcomeController::class, 'search']);

//admin

Route::get('/admin/login',[AdminLoginController::class, 'showLoginForm']);
Route::post('/admin/login',[AdminLoginController::class, 'login']);

//product

Route::resource('admin/products', ProductController::class);

//shopitem
Route::get('/shopitem', [WelcomeController::class, 'buymore']);

Route::get('/lang/home', [LangController::class, 'index']);
 
Route::get('/lang/change', [LangController::class, 'change'])->name('changeLang');

//cart
Route::get('/cart', [WelcomeController::class, 'cart']);
Route::get('/cart/addtocart', [WelcomeController::class, 'addcart']);
Route::post('/cart/addtocart', [WelcomeController::class, 'addcart']);
Route::get('cart/remove-item/{id}', [WelcomeController::class, 'removecart']);

//order-placement
Route::get('/orderplacement', [ProfileController::class, 'oderplace']);
Route::post('/orderplacement', [ProfileController::class, 'oderplace']);
Route::post('/orderplacement/success', [ProfileController::class, 'success']);

//orders
Route::get('/admin/orders', [OrderController::class, 'index']);
Route::get('/admin/orders/{id}', [OrderController::class, 'confirm']);

//payment
Route::post('/payment', [WelcomeController::class, 'payment']);
Route::post('/payment/success', [ProfileController::class, 'success']);


//mail

/*Route::get('/sendemail', [SendEmailController::class, 'index']);
Route::post('/sendemail/send', [SendEmailController::class, 'send']);*/

//profles
Route::get('profiles', [ProfileController::class, 'index']);
Route::get('profiles/create', [ProfileController::class, 'create']);
Route::post('profiles', [ProfileController::class, 'store']);
Route::get('profiles/{id}', [ProfileController::class, 'show']);
Route::get('profiles/{id}/edit', [ProfileController::class,'edit']);
Route::put('profiles/{id}', [ProfileController::class, 'update']);
Route::get('/changePassword', [ProfileController::class, 'showChangePasswordForm']);
Route::post('/changePassword', [ProfileController::class, 'changePassword'])->name('changePassword');









// Route::get('mail',function(){

//  return view('front.cart.cart');
// });

// Route::post('mail',function(){

//  Mail::to('tafsirul15-8661@diu.edu.bd')->send(new DemoMail());


// });
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Login
Route::get('/admin/login', [
    AdminLoginController::class,
    'showLoginForm'
])->name('admin.login');

Route::post('/admin/login', [
    AdminLoginController::class,
    'login'
])->name('admin.login.submit');

Route::post('/admin/logout', [
    AdminLoginController::class,
    'logout'
])->middleware('auth:admin')->name('admin.logout');

// Protected Finance Routes
Route::middleware('auth:admin')
    ->prefix('admin/finance')
    ->name('finance.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('products', ProductController::class)
            ->except(['show']);

        Route::resource('customers', CustomerController::class)
            ->except(['show']);

        Route::resource('suppliers', SupplierController::class)
            ->except(['show']);

        Route::resource('expense-categories', ExpenseCategoryController::class)
            ->except(['show']);

        Route::resource('expenses', ExpenseController::class)
            ->except(['show']);

        Route::resource('sales', SaleController::class)
            ->only(['index', 'create', 'store', 'show', 'destroy']);

        Route::resource('purchases', PurchaseController::class)
            ->only(['index', 'create', 'store', 'show', 'destroy']);

        Route::get('/reports', [ReportController::class, 'index'])
            ->name('reports');
    });
