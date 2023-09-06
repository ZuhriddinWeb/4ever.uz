<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\TreeController;
use App\Http\Controllers\api\ProductsController;
use App\Http\Controllers\api\StatusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\api\OrdersController;
use App\Http\Controllers\api\Order_ProductController;
use App\Http\Controllers\api\CartController;
// use App\Http\Controllers\api\UserConnectController;
use App\Http\Controllers\api\PayCheckController;
use App\Http\Controllers\api\VirtualCardsController;
use App\Http\Controllers\api\CashbackController;
use App\Http\Controllers\api\UniversalBonusController;
use App\Http\Controllers\api\UserCardController;
use App\Http\Controllers\StartBonusController;
use App\Http\Controllers\MoneyController;
use App\Http\Controllers\api\ViloyatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!935360266 yuldashova surrayyo zaripova
|
*/
Route::post('/regstration' , [UserController::class, 'register']);
Route::get('/parent_name/{id}' , [UserController::class, 'getParent']);

Route::post('/login' , [UserController::class, 'login']);
Route::post('/logout' , [UserController::class, 'login']);
Route::get('/products-limit', [ProductsController::class, 'limit']);
Route::get('/products-with-cat/{id}', [ProductsController::class, 'limit_category']);
Route::get('/products-by-id/{id}', [ProductsController::class, 'show']);
Route::get('/uzsnbu', [ProductsController::class, 'index_UZS']);
Route::get('/category', [CategoryController::class, 'index']);
Route::post('/products-filter', [ProductsController::class, 'filter']);
Route::get('/tree', [TreeController::class, 'index']);


Route::middleware(['auth:sanctum', 'abilities:admin'])->group(function () {
    // Category routes
    Route::get('/getusers/{period}/{userid}' , [UniversalBonusController::class, 'getUsersWith']);
    // 
    Route::apiResource('startbonus' , StartBonusController::class);
    Route::apiResource('money' , MoneyController::class)->except('show', 'index');
    Route::get('/money/{userid}' , [MoneyController::class, 'index']);
    Route::get('/money/{period}/{userid}' , [MoneyController::class, 'show']);
// 

    Route::post('/category-save', [CategoryController::class, 'store']);
    Route::get('/category_id/{id}', [CategoryController::class, 'index_id']);
    Route::post('/category-delete', [CategoryController::class, 'delete']);
    Route::post('/category-update/{id}', [CategoryController::class, 'update']);

    // Tip routes 
    Route::post('/tree-save', [TreeController::class, 'store']);
    Route::post('/tree-update/{id}', [TreeController::class, 'update']);
    Route::post('/tree-delete', [TreeController::class, 'delete']);

    // Products routes
    Route::get('/products/{id}', [ProductsController::class, 'index']);
    // Route::get('/products-limit', [ProductsController::class, 'limit']);
    Route::post('/product-save', [ProductsController::class, 'store']);
    Route::post('/product-delete', [ProductsController::class, 'delete']);
    Route::post('/product-update', [ProductsController::class, 'update']);

    // Status routes
    Route::post('/status-save', [StatusController::class, 'store']);
    Route::get('/status', [StatusController::class, 'index']);
    Route::get('/status-id/{id}', [StatusController::class, 'index_id']);
    Route::post('/status-delete', [StatusController::class, 'delete']);
    Route::post('/status-update', [StatusController::class, 'update']);
   
    // User routes
    Route::get('/users-select', [UserController::class, 'index']);

    // Route::apiResource('photos', UserController::class);
    // Buyurtmlar
    Route::post('/order-pay-check', [OrdersController::class, 'update']);
    Route::post('/order/register', [OrdersController::class, 'register']);

    Route::get('/orders', [OrdersController::class, 'index_all']);
    Route::get('/completedOrders', [OrdersController::class, 'getCompleted']);
    Route::get('/getWithProducts/{id}', [OrdersController::class, 'getWithProducts']);

    
    Route::get('/getOrderStatuses/{id}', [OrdersController::class, 'getOrderStatuses']);
    Route::get('/getSendOrder/{id}', [OrdersController::class, 'getSendOrder']);
    Route::get('/orders-left', [OrdersController::class, 'getLeftOrders']);


    Route::get('/pay-check', [PayCheckController::class, 'index']);
});

Route::middleware(['auth:sanctum', 'ability:user,admin'])->group(function () {
    Route::post('/order-save', [OrdersController::class, 'create']);
    Route::get('/user-order/{id}', [OrdersController::class, 'index']);
    Route::get('/order-by-id/{id}', [OrdersController::class, 'index_by_id']);    
    Route::get('/cart-save/{id}', [CartController::class, 'store']);
    Route::get('/cart-user/{id}', [CartController::class, 'index']); 
    Route::get('/count-cart', [CartController::class, 'show']);
    // Route::get('/count', [ProductsController::class, 'count']);

    Route::post('/cart-clear', [CartController::class, 'clear']);

    Route::delete('/cart/{id}', [CartController::class, 'destroy']);
    Route::get('/cart_index/{id}', [CartController::class, 'index_id']);
    Route::post('/order-pay-save', [OrdersController::class, 'updated_order']);

    // Route::get('/users-connects', [UserConnectController::class, 'index']);

    Route::get('/virtual-numbers', [VirtualCardsController::class, 'index']);
    Route::get('/cashback', [CashbackController::class, 'index']);

    Route::post('/user-card-save', [UserCardController::class, 'create']);
    Route::get('/user-cards/{id}', [UserCardController::class, 'index']);
    Route::get('/user-info/{id}', [UserController::class, 'info']);
    Route::get('/viloyat', [ViloyatController::class, 'index']);
    Route::get('/tuman/{id}', [ViloyatController::class, 'tuman']);
    Route::get('/getPay', [ViloyatController::class, 'getPay']);
    Route::get('/latest', [OrdersController::class, 'getLatest']);

    Route::get('/getuniversalbonuses' , [UniversalBonusController::class, 'getUniversalBonuses']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user' , [UserController::class, 'getUser']);

});


// 