<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(LandingPageController::class)->name('landing.')->group( function() {
    Route::get('/', 'index')->name('index');
    Route::get('/article/{slug}', 'articleDetail')->name('article-detail');
    Route::post('/comment', 'commentPost')->name('comment-post');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::controller(HomeController::class)->name('admin.')->group( function() {
        Route::get('/home', 'index')->name('index');
        Route::get('/create', 'articleCreate')->name('article-create');
        Route::post('/create', 'articlePost')->name('article-post');
        Route::get('/edit/{slug}', 'articleEdit')->name('article-edit');
        Route::post('/update/{slug}', 'articleUpdate')->name('article-update');
        Route::put('/delete/{id}', 'articleDelete')->name('article-delete');
    });

    Route::controller(CommentController::class)->name('admin.comment.')->group( function() {
        Route::get('/admin/komentar', 'index')->name('index');
        Route::put('/admin/komentar/delete/{id}', 'commentDelete')->name('comment-delete');
    });

    Route::controller(LaporanController::class)->name('admin.laporan.')->group( function() {
        Route::get('/admin/laporan', 'index')->name('index');
    });
});
