<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\ToolsController;



Route::get('/', [FrontendController::class, 'index'])->name('home');
