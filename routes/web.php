<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\ToolsController;



Route::get('/{slug?}', [FrontendController::class, 'showPageBySlug'])
    ->where('slug', '[a-zA-Z0-9-]+')
    ->name('page.get');
