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

Route::post('/api/form/submit',
    [\App\Http\Controllers\FormAPIController::class, 'index']
)->name('api.form');

Route::get('/contact', function(){
    return view('public.contact.index');
})->name('contact');

Route::get('/about', function(){
    return view('public.about.index');
})->name('about');

Route::match(
    ['get', 'post'],
    '/login',
    [\App\Http\Controllers\Admin\AdminController::class, 'index']
)->name('login');

Route::get('/logout', [\App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('logout');

Route::prefix('admin')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])
        ->name('admin-home');

        Route::match(
            ['get', 'patch', 'delete', 'post',],
            '/service/{id?}',
            [\App\Http\Controllers\Admin\AdminServiceController::class, 'index'])
            ->name('admin-service');

        Route::match(
            ['get', 'patch', 'delete', 'post',],
            '/news/{id?}',
            [\App\Http\Controllers\Admin\AdminNewsController::class, 'index'])
            ->name('admin-news');

        Route::match(
            ['get', 'patch', 'delete', 'post',],
            '/form/{id?}',
            [\App\Http\Controllers\Admin\AdminFormController::class, 'index'])
            ->name('admin-form');

        Route::match(
            ['get', 'patch', 'delete', 'post',],
            '/make',
            [\App\Http\Controllers\Admin\AdminMakerController::class, 'index'])
        ->name('admin-make');
});

Route::prefix('api')->group(function () {});

