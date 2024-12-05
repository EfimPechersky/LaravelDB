<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Http\Resources\OrderResource;
use App\Models\Order;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/clients', [ClientController::class, 'get_clients']);
Route::post('/clients/store', [ClientController::class, 'store']);
Route::post('/clients/delete', [ClientController::class, 'delete_client']);
Route::post('/clients/change', [ClientController::class, 'change_client']);
Route::get('/orders', [OrderController::class, 'get_orders']);
Route::post('/orders/store', [OrderController::class, 'store']);
Route::post('/orders/delete', [OrderController::class, 'delete_order']);
Route::post('/orders/change', [OrderController::class, 'change_order']);
Route::get('/client/{id}', function (string $id) {
    return new ClientResource(Client::findOrFail($id));
});
Route::get('/order/{id}', function (string $id) {
    return new OrderResource(Order::findOrFail($id));
});

