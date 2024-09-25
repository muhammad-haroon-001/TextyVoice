<?php

use App\Http\Controllers\dashboard\ContactController;
use App\Http\Controllers\frontend\CustomArrayController;
use App\Http\Controllers\frontend\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/custom_pages.php';

route::resource('contact',ContactController::class);
//blog page
Route::get('blog', [CustomArrayController::class, 'main_blog_page'])->name('blog');
Route::get('blog/{slug}', [CustomArrayController::class, 'single_blog_page'])->name('single.blog');
Route::controller(FrontendController::class)->group(function () {
  Route::get('/','homeTool')->name('home');
  Route::get('/{slug}','native_tools_language')->name('tool');
  Route::get('{lang}/{slug}','other_tools_language')->where(['lang' => '[a-z]{2}', 'slug' => '[\w-]+' ])->name('tool.lang');
});
// Route for custom pages directly with {slug}
// Route::get('{slug}', [FrontendController::class, 'showCustomPageBySlug'])->name('custom.page');
