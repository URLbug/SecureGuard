<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.index');
})->name('home');

Route::prefix('service')->group(function () {
    Route::get('/{id?}', [\App\Http\Controllers\ServiceController::class, 'index'])
        ->where('id', '[0-9]+')
        ->name('service');

    Route::get('/price', [\App\Http\Controllers\ServiceController::class, 'index'])
        ->name('service-price');
});


Route::prefix('news')->group(function () {
    Route::get('/{id?}', [\App\Http\Controllers\NewsController::class, 'index'])
        ->where('id', '[0-9]+')
        ->name('news');
});

Route::get('/contact', function(){
    return view('public.contact.index');
})->name('contact');

Route::get('/about', function(){
    return view('public.about.index');
})->name('about');


Route::prefix('ajax')->group(function () {});
