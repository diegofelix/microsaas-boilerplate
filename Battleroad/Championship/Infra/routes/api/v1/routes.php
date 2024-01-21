<?php

use Battleroad\Championship\Infra\Http\Controllers\ChampionshipsController;
use Illuminate\Support\Facades\Route;

Route::any('championships', [ChampionshipsController::class, 'store']);
