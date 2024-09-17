<?php

use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\EmdCustomPageDisplayController;
use Illuminate\Support\Facades\Route;


Route::controller(EmdCustomPageDisplayController::class)->group(function () {
    Route::get('contact-us', 'custom_page_display')->name('EmdCustomPage.contact-us');
    Route::get('terms-of-services', 'custom_page_display')->name('EmdCustomPage.terms-of-services');
    Route::get('contact-us', 'custom_page_display')->name('EmdCustomPage.contact-us');
});
