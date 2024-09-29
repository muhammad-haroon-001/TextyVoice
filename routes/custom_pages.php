<?php

use App\Http\Controllers\EmdCustomPageDisplayController;
use Illuminate\Support\Facades\Route;


Route::controller(EmdCustomPageDisplayController::class)->group(function () {
  Route::get('contact-us', 'custom_page_display')->name('EmdCustomPage.contact-us');
    Route::get('about-us', 'custom_page_display')->name('EmdCustomPage.about-us');
    Route::get('terms-condition', 'custom_page_display')->name('EmdCustomPage.terms-condition');
    Route::get('privacy-policy', 'custom_page_display')->name('EmdCustomPage.privacy-policy');
});