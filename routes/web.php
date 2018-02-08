<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('community', 'HomeController@community')->name('community');
Route::get('about', 'HomeController@about')->name('about');
Route::get('support', 'HomeController@support')->name('support');
Route::get('author', 'HomeController@author')->name('author');

Route::get('login', 'AuthController@login')->name('login');
Route::get('register', 'AuthController@register')->name('register');

Route::get('genres', 'GenreController@showGenreGames')->name('genres');
