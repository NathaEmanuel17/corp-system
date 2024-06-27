<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('/change-password', [App\Http\Controllers\AuthController::class, 'changePassword'])->name('changePassword');
Route::post('/change-password', [App\Http\Controllers\AuthController::class, 'postChangePassword'])->name('change-password');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () { return view('pages.app.dashboard.index'); })->name('dashboard');

    Route::middleware('verify.url.access.control')->group(function () {        
        
        Route::post('/update-profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('update-profile');
        Route::post('/update-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('update-password');
        Route::get('/profile/{user}', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');

        Route::resource('/menus', App\Http\Controllers\Manage\MenuController::class);
        Route::resource('/users', App\Http\Controllers\UserController::class);
        Route::put('/users/block/{user}', [App\Http\Controllers\UserController::class, 'blockOrUnblock'])->name('users.block');
        
        Route::resource('/clients', App\Http\Controllers\ClientController::class);
        Route::resource('/products', App\Http\Controllers\ProductController::class);
        
        Route::resource('/sales', App\Http\Controllers\SaleController::class);
        Route::post('/sales-report', [App\Http\Controllers\SaleController::class, 'report'])->name('sales.report');

        Route::get('/purchase', [App\Http\Controllers\PurchaseController::class, 'index'])->name('purchase.index');
        Route::get('/purchase/{product}', [App\Http\Controllers\PurchaseController::class, 'show'])->name('purchase.show');

        Route::get('/manage-access-permissions', [App\Http\Controllers\Manage\ManageMenuPermissionController::class, 'index'])->name('manage.access.permissions.index');
        Route::put('/menu-access-permissions', [App\Http\Controllers\Manage\UrlAccessControlController::class, 'update'])->name('url.access.control.update');
    });
});
