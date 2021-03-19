<?php

use Illuminate\Support\Facades\Route;

Route::get('/categoria', function () {
    return view('categoria');
});
Route::get('/', function () {
    return view('producto');
});
