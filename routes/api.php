<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;


Route
  ::controller(AuthController::class)
  ->group(function () {
    Route::post('signup', 'signup');
    Route::post('login', 'login');
  });
