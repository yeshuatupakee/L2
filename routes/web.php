<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portfolio');
});


Route::get('/agent-portal', function () {
    return view('agent-portal');
});

Route::get('/customer-portal', function () {
    return view('customer-portal');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});



