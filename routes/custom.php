<?php

use App\Http\Controllers\frontend\languageSwitcherController;
use App\Http\Controllers\frontend\TextToSpeechController;
use Illuminate\Support\Facades\Route;

Route::controller(TextToSpeechController::class)->group(function () {
    Route::post('uploadFile', 'Upload')->name('upload');
    Route::post('TextToSpeech', 'TextToSpeech')->name('TextToSpeech');
});

Route::post('language-switch',[languageSwitcherController::class,'Index'])->name('language-switch');