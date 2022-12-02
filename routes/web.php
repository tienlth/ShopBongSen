<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('roleChecking')->group(function(){
    Route::resource('/', 'App\Http\Controllers\Home\HomeController');
    
    Route::resource('/introduction', 'App\Http\Controllers\Home\IntroductionController');

    Route::resource('/contact', 'App\Http\Controllers\Home\ContactController');
    
    Route::resource('/products', 'App\Http\Controllers\Home\ProductsController');

    Route::resource('/evaluations', 'App\Http\Controllers\Home\EvaluationController');
});

Route::middleware(['auth', 'roleChecking'])->group(function(){
    Route::prefix('/account')->group(function(){
        Route::get('/', 'App\Http\Controllers\AccountRedirectController@redirect')->name('account');
        Route::get('/changepassword', 'App\Http\Controllers\AccountRedirectController@changepasswordRedirect');
        Route::post('/changepassword', 'App\Http\Controllers\AccountRedirectController@changepassword')->name('account.changepassword');
    });
});

Route::resource('/cart', 'App\Http\Controllers\Home\CartController')->middleware(['auth', 'roleChecking']);

Route::middleware(['auth', 'roleChecking', 'userChecking'])->group(function(){

    Route::resource('/account-user-info', 'App\Http\Controllers\Home\AccountUserInfoController');

    Route::post('/cart-update', 'App\Http\Controllers\Home\CartUpdateController@update')->name('cart-update');
    Route::post('/cart-delete/{id}', 'App\Http\Controllers\Home\CartUpdateController@delete')->name('cart-delete');
    
    Route::resource('/account-user-orders', 'App\Http\Controllers\Home\AccountUserOrdersController');
});

Route::resource('/home-orders', 'App\Http\Controllers\Home\HomeOrderController');

Route::middleware(['auth', 'roleChecking', 'staffChecking'])->group(function(){

    Route::resource('/account-staff-info', 'App\Http\Controllers\Home\AccountStaffInfoController');
    Route::post('/dashboard-staff-info/update/{id}', 'App\Http\Controllers\Home\AccountStaffInfoController@update')->name('staff-info-update');
    
    Route::resource('/account-staff-turnover', 'App\Http\Controllers\Home\AccountStaffTurnOverController');

    Route::resource('/account-staff-orders', 'App\Http\Controllers\Home\AccountStaffOrdersController');
});

Route::middleware(['auth', 'roleChecking', 'adminChecking'])->group(function(){
    Route::prefix('/dashboard')->group(function(){
        Route::resource('/dashboard-home', 'App\Http\Controllers\Admin\HomeController');

        Route::prefix('/ware')->group(function(){
            Route::resource('/dashboard-inventories', 'App\Http\Controllers\Admin\InventoryController');
            Route::post('/dashboard-inventories/update/{id}', 'App\Http\Controllers\Admin\InventoryController@update')->name('inventory-update');
    
            Route::resource('/dashboard-imports', 'App\Http\Controllers\Admin\ImportCouponsController');
    
            Route::resource('/dashboard-ingredients', 'App\Http\Controllers\Admin\IngredientController');
            Route::post('/dashboard-ingredients/update/{id}', 'App\Http\Controllers\Admin\IngredientController@update')->name('ingredient-update');
            Route::post('/dashboard-ingredients/delete/{id}', 'App\Http\Controllers\Admin\IngredientController@destroy')->name('ingredient-delete');
            Route::post('/dashboard-ingredients/delete', 'App\Http\Controllers\Admin\IngredientController@destroyMulti')->name('ingredient-deleteMulti');
    
            Route::resource('/dashboard-suppliers', 'App\Http\Controllers\Admin\SuppliersController');
            Route::post('/dashboard-supplierss/update/{id}', 'App\Http\Controllers\Admin\SuppliersController@update')->name('supplier-update');
            Route::post('/dashboard-supplierss/delete/{id}', 'App\Http\Controllers\Admin\SuppliersController@destroy')->name('supplier-delete');
            Route::post('/dashboard-supplierss/delete', 'App\Http\Controllers\Admin\SuppliersController@destroyMulti')->name('supplier-deleteMulti');
        });
        
        Route::resource('/dashboard-staffs', 'App\Http\Controllers\Admin\StaffsController');
        Route::post('/dashboard-staffs/update/{id}', 'App\Http\Controllers\Admin\StaffsController@update')->name('staff-update');
        Route::post('/dashboard-staffs/delete/{id}', 'App\Http\Controllers\Admin\StaffsController@destroy')->name('staff-delete');
        Route::post('/dashboard-staffs/delete', 'App\Http\Controllers\Admin\StaffsController@destroyMulti')->name('staff-deleteMulti');

        Route::resource('/dashboard-products', 'App\Http\Controllers\Admin\ProductsController');
        Route::post('/dashboard-products/delete/{id}', 'App\Http\Controllers\Admin\ProductsController@destroy')->name('product-delete');
        Route::post('/dashboard-products/delete', 'App\Http\Controllers\Admin\ProductsController@destroyMulti')->name('product-deleteMulti');

        Route::prefix('/statistic')->group(function(){

            Route::resource('/dashboard-turnovers', 'App\Http\Controllers\Admin\TurnoverController');

            Route::resource('/dashboard-orders', 'App\Http\Controllers\Admin\OrderController');
            Route::post('/dashboard-orders/update/{dashboard_order}', 'App\Http\Controllers\Admin\OrderController@update')->name('order-update');

            Route::resource('/dashboard-feedbacks', 'App\Http\Controllers\Admin\FeedbackController');
        });
    });
});

require __DIR__.'/auth.php';
