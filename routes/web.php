<?php


use Illuminate\Support\Facades\Route;
use Ykmar\VueI18nTranslationLoader\Controllers\TranslationController;

Route::get('translations/{translationName}', [TranslationController::class, 'transform'])->middleware('auth');
