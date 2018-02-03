<?php

Route::get('/', function () { return view('home'); })->name('home');


Route::get('about', function () { return view('home'); })->name('about');

Route::get('support', function () { return view('home'); })->name('support');

Route::get('author', function () { return view('home'); })->name('author');


Route::get('login', function () { return view('home'); })->name('login');

Route::get('register', function () { return view('home'); })->name('register');
