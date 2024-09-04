<?php

use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\dashboard\BlogController;
use App\Http\Controllers\dashboard\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolsController;


Route::prefix('emd')->group(function () {
  Route::get('dashboard', [DashboardController::class, 'index'])->name('Emd.dashboard');
  Route::get('tools', [ToolsController::class, 'index'])->name('Emd.tools');
  Route::get('create-tools', [ToolsController::class, 'create'])->name('Emd.tools.create');
  Route::post('store-tools', [ToolsController::class, 'store'])->name('Emd.tools.store');
  Route::delete('delete-tool/{id}', [ToolsController::class,'destroy'])->name('Emd.tools.destroy');
  Route::get('trash-tools', [ToolsController::class,'trash_tools'])->name('Emd.tools.trash');
  Route::put('restore-tool/{id}', [ToolsController::class,'restore_tool'])->name('Emd.tools.restore');
  Route::get('edit-tool/{slug}', [ToolsController::class,'edit'])->name('Emd.tools.edit');
  Route::put('update-tool/{id}', [ToolsController::class,'update'])->name('Emd.tools.update');
  Route::get('download-content/{id}', [ToolsController::class,'download_content_file'])->name('Emd.tools.download');
  Route::post('upload-content/{id}', [ToolsController::class,'upload_content_file'])->name('Emd.tools.upload');
  Route::resource('custom-page', CustomPageController::class);
  Route::get('download-custom-page/{id}', [CustomPageController::class,'download_content_file'])->name('Emd.custom-page.download');

  //blog
  Route::resource('blog', BlogController::class);
});
