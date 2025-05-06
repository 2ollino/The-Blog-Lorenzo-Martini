<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('create-article', [ArticleController::class, 'create'])->name('article.create');
Route::post('store-article', [ArticleController::class, 'store'])->name('article.store');