<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\ToolsController;

// Main Page Route
Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');

Route::prefix('emd')->group(function () {
  Route::get('tools', [ToolsController::class, 'index'])->name('Emd.tools');
  Route::get('create-tools', [ToolsController::class, 'create'])->name('Emd.tools.create');
  Route::post('store-tools', [ToolsController::class, 'store'])->name('Emd.tools.store');
});
