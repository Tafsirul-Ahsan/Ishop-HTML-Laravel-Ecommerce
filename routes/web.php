<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Finance\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Finance\CustomerController;
use App\Http\Controllers\Finance\SupplierController;
use App\Http\Controllers\Finance\ExpenseCategoryController;
use App\Http\Controllers\Finance\ExpenseController;
use App\Http\Controllers\Finance\SaleController;
use App\Http\Controllers\Finance\PurchaseController;
use App\Http\Controllers\Finance\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\Auth\AdminLoginController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
| Routes available without login.
*/

Route::get('/', [WelcomeController::class, 'index'])
    ->name('welcome');

Route::get('/product-details-{id}', [
    WelcomeController::class, 'details'
])->name('product.details');

Route::get('/about', [WelcomeController::class, 'about']);

Route::get('/shopitem', [WelcomeController::class, 'buymore']);

Route::post('/search', [
    WelcomeController::class, 'search'
])->middleware('throttle:30,1')->name('search');

Route::get('/lang/home', [LangController::class, 'index']);
Route::get('/lang/change', [LangController::class, 'change'])
    ->name('changeLang');

// Cart: modifications must use POST/DELETE, not GET.
Route::get('/cart', [WelcomeController::class, 'cart'])
    ->name('cart.index');

Route::post('/cart/addtocart', [
    WelcomeController::class, 'addcart'
])->middleware('throttle:30,1')->name('cart.add');

Route::delete('/cart/remove-item/{id}', [
    WelcomeController::class, 'removecart'
])->whereNumber('id')->name('cart.remove');

// Checkout and payment
Route::get('/orderplacement', [
    WelcomeController::class, 'oderplace'
])->name('orderplacement');

Route::post('/orderplacement', [
    WelcomeController::class, 'oderplace'
])->middleware('throttle:10,1')
  ->name('orderplacement.store');

Route::post('/orderplacement/success', [
    WelcomeController::class, 'success'
])->name('orderplacement.success');

Route::post('/payment', [
    WelcomeController::class, 'payment'
])->middleware('throttle:10,1')->name('payment');

Route::post('/payment/success', [
    ProfileController::class, 'success'
])->name('payment.success');


/*
|--------------------------------------------------------------------------
| CUSTOMER AUTHENTICATION
|--------------------------------------------------------------------------
*/

Auth::routes();

// Avoid duplicate /home route definitions.
Route::get('/home', [HomeController::class, 'index'])
    ->middleware('auth')->name('home');


/*
|--------------------------------------------------------------------------
| ADMIN LOGIN
|--------------------------------------------------------------------------
| Separate admin guard and rate-limited login attempts.
*/

Route::middleware('guest:admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/login', [
            AdminLoginController::class, 'showLoginForm'
        ])->name('login');

        Route::post('/login', [
            AdminLoginController::class, 'login'
        ])->middleware('throttle:5,1')
          ->name('login.submit');
    });

Route::post('/admin/logout', [
    AdminLoginController::class, 'logout'
])->middleware('auth:admin')->name('admin.logout');


/*
|--------------------------------------------------------------------------
| PROTECTED ADMIN ROUTES
|--------------------------------------------------------------------------
| Every route in this group requires an authenticated admin.
*/

Route::middleware('auth:admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
Route::resource('categories', CategoryController::class);
        Route::get('/dashboard', [
            AdminController::class, 'index'
        ])->name('dashboard');

        // Legacy product URLs, if existing views still use them.
        Route::resource('products', ProductController::class)
            ->except(['show']);

        Route::get('/orders', [
            OrderController::class, 'index'
        ])->name('orders.index');

        // Use POST only if confirm() performs an order-state change.
        Route::post('/orders/{id}/confirm', [
            OrderController::class, 'confirm'
        ])->whereNumber('id')->name('orders.confirm');
    });


/*
|--------------------------------------------------------------------------
| PROTECTED CUSTOMER PROFILE ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profiles', [
        ProfileController::class, 'index'
    ])->name('profiles.index');

    Route::get('/profiles/create', [
        ProfileController::class, 'create'
    ])->name('profiles.create');

    Route::post('/profiles', [
        ProfileController::class, 'store'
    ])->name('profiles.store');

    Route::get('/profiles/{id}', [
        ProfileController::class, 'show'
    ])->whereNumber('id')->name('profiles.show');

    Route::get('/profiles/{id}/edit', [
        ProfileController::class, 'edit'
    ])->whereNumber('id')->name('profiles.edit');

    Route::put('/profiles/{id}', [
        ProfileController::class, 'update'
    ])->whereNumber('id')->name('profiles.update');

    Route::get('/changePassword', [
        ProfileController::class, 'showChangePasswordForm'
    ])->name('password.change');

    Route::post('/changePassword', [
        ProfileController::class, 'changePassword'
    ])->middleware('throttle:5,1')
      ->name('password.update');

    Route::post('/logout', function (Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    })->name('logout');
});


/*
|--------------------------------------------------------------------------
| PROTECTED FINANCE MODULE
|--------------------------------------------------------------------------
*/

Route::middleware('auth:admin')
    ->prefix('admin/finance')
    ->name('finance.')
    ->group(function () {

        Route::get('/dashboard', [
            DashboardController::class, 'index'
        ])->name('dashboard');

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

        Route::get('/reports', [
            ReportController::class, 'index'
        ])->name('reports');
    });