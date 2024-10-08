<?php

use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\dashboard\BlogController;
use App\Http\Controllers\dashboard\ContactController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\SettingKeyController;
use App\Http\Controllers\dashboard\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolsController;

Route::prefix('emd')->middleware('auth')->group(function () {
  Route::get('dashboard', [DashboardController::class, 'index'])->name('Emd.dashboard');
  Route::get('tools', [ToolsController::class, 'index'])->name('Emd.tools');
  Route::get('create-tools', [ToolsController::class, 'create'])->name('Emd.tools.create');
  Route::post('store-tools', [ToolsController::class, 'store'])->name('Emd.tools.store');
  Route::delete('delete-tool/{id}', [ToolsController::class, 'destroy'])->name('Emd.tools.destroy');
  Route::get('trash-tools', [ToolsController::class, 'trash_tools'])->name('Emd.tools.trash');
  Route::put('restore-tool/{id}', [ToolsController::class, 'restore_tool'])->name('Emd.tools.restore');
  Route::get('edit-tool/{slug}', [ToolsController::class, 'edit'])->name('Emd.tools.edit');
  Route::put('update-tool/{id}', [ToolsController::class, 'update'])->name('Emd.tools.update');
  Route::get('download-content/{id}', [ToolsController::class, 'download_content_file'])->name('Emd.tools.download');
  Route::post('upload-content/{id}', [ToolsController::class, 'upload_content_file'])->name('Emd.tools.upload');
  Route::resource('custom-page', CustomPageController::class);
  Route::resource('custom-page', CustomPageController::class);
  Route::get('download-custom-page/{id}', [CustomPageController::class,'download_content_file'])->name('Emd.custom-page.download');
  Route::post('custom-page-upload-content/{id}', [CustomPageController::class, 'upload_content_file'])->name('Emd.custom-page.upload');
  //blog
  Route::resource('blog', BlogController::class);
  Route::get('trash-blog', [BlogController::class,'trash_blog'])->name('Emd.blog.trash');
  Route::put('restore-blog/{id}', [BlogController::class,'restore_blog'])->name('Emd.blog.restore');

  //setting keys
  Route::resource('setting-key', SettingKeyController::class);
  // users
  Route::resource('users', UserController::class);
  Route::get('trash-user', [UserController::class,'TrashUser'])->name('Emd.user.trash');
  Route::put('restore-user/{id}', [UserController::class,'restoreUser'])->name('Emd.users.restore');
  Route::get('trash-contact-user', [ContactController::class,'TrashUser'])->name('Emd.contact.user.trash');
  Route::put('restore-contact-user/{id}', [ContactController::class,'restoreUser'])->name('Emd.contact.users.restore');
})->middleware('auth');
