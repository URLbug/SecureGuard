<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.index');
})->name('home');

Route::prefix('service')->group(function () {
    Route::get('/{id?}', function(?int $id = null){
        return view('public.service.index');
    })->where('id', '[0-9]+')
        ->name('service');
});


Route::prefix('news')->group(function () {
    Route::get('/{id?}', function(?int $id = null){
        return view('public.news.index');
    })->where('id', '[0-9]+')
        ->name('news');
});

Route::get('/contact', function(){
    return view('public.contact.index');
})->name('contact');

Route::get('/about', function(){
    return view('public.about.index');
})->name('about');
