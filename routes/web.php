<?php

use Illuminate\Support\Facades\Route;

Route::get('/categorias', function () {
    return view('categoria');
});
Route::get('/productos', function () {
    return view('producto');
});
Route::get('/', function () {
    return view('dashboard');
});
