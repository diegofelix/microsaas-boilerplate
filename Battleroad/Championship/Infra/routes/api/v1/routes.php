<?php

use Battleroad\Championship\Infra\Http\Controllers\ChampionshipsController;
use Illuminate\Support\Facades\Route;

Route::post('championships', [ChampionshipsController::class, 'store']);
