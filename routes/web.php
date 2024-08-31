<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\ToolsController;



Route::get('/{slug?}', [FrontendController::class, 'showToolBySlug'])
    ->where('slug', '[a-zA-Z0-9-]+') // Match valid slugs
    ->name('Emd.tools.get');
