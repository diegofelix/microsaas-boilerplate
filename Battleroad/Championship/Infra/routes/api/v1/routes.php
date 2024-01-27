<?php

use Battleroad\Championship\Infra\Http\Controllers\ChampionshipsController;
use Battleroad\Championship\Infra\Http\Controllers\CompetitionsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'championships',
    'as' => 'championships.',
], function () {
    Route::post('/', [ChampionshipsController::class, 'store'])->name('store');
    Route::post('{championship}/competitions', [CompetitionsController::class, 'store'])->name('add_competition');
});
