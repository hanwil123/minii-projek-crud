<?php

use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::post('/products', [ProductController::class, 'store']);
Route::post('/campaigns', [CampaignController::class, 'store']); // Use this route for creating new products


