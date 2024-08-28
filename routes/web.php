<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\ToolsController;



Route::get('/{lang?}/{slug?}', [FrontendController::class, 'showToolBySlug'])
    ->name('Emd.tools.get');
