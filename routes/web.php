<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\ToolsController;



Route::get('/', [FrontendController::class, 'homeTool'])->name('home');

// Route for tools without language parameter (e.g., /tool-slug)
Route::get('/{slug}', [FrontendController::class, 'native_tools_language'])->name('tool');

// Route for tools with language parameter (e.g., /es/tool-slug)
Route::get('{lang}/{slug}', [FrontendController::class, 'other_tools_language'])->where(['lang' => '[a-z]{2}', 'slug' => '[\w-]+'])->name('tool.lang');

// Route for custom pages directly with {slug}
// Route::get('{slug}', [FrontendController::class, 'showCustomPageBySlug'])->name('custom.page');
