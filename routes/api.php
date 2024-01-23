<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CampaignController;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']); // Use this route for creating new products
Route::post('/campaigns', [CampaignController::class, 'store']); // Use this route for creating new products
Route::get('/campaigns/{id}', [CampaignController::class, 'show']); // Use this route for creating new products
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
Route::resource('campaigns', CampaignController::class);
Route::resource('products', ProductController::class);
