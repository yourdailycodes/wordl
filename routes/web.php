<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\WordlController;


Route::get('/', [LandingController::class, 'welcome']);

Route::post('/wordl/check', [WordlController::class, 'check'])->name('wordl.check');


