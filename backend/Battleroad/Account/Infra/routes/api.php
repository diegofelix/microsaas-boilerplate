<?php

use Battleroad\Account\Infra\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('user', UsersController::class)
    ->middleware('auth:sanctum')
    ->name('user');
