<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;

Route::resources([
    'state' => StateController::class,
    'city' => CityController::class,
]);

Route::get('/search/city', [CityController::class, 'consultCityName']);
