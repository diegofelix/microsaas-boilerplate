<?php

use Battleroad\Account\Infra\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [SessionController::class, 'store'])
    ->name('login');
