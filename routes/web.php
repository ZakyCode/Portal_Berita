<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return redirect('/news');
});

Route::resource('news', NewsController::class);
