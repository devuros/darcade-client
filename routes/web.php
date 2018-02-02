<?php

Route::get('/', function () { return view('index'); })->name('index');


Route::get('about', function () { return view('index'); })->name('about');

Route::get('support', function () { return view('index'); })->name('support');

Route::get('author', function () { return view('index'); })->name('author');


Route::get('login', function () { return view('index'); })->name('login');

Route::get('register', function () { return view('index'); })->name('register');
