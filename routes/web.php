<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('community', 'HomeController@community')->name('community');
Route::get('about', 'HomeController@about')->name('about');
Route::get('support', 'HomeController@support')->name('support');
Route::get('author', 'HomeController@author')->name('author');

Route::get('login', 'AuthController@login')->name('login');
Route::get('register', 'AuthController@register')->name('register');

Route::get('games/{id}', 'GameController@show')->name('games.show');

Route::get('genres/{id}', 'GenreController@showGenreGames')->name('genres.showGenreGames');

Route::get('developers/{id}', 'DevController@index')->name('developers.index');

Route::get('publishers/{id}', 'PubController@index')->name('publishers.index');

Route::get('search/top-sellers', 'SearchController@topSellers')->name('search.top');
Route::get('search/new-releases', 'SearchController@newReleases')->name('search.new');
Route::get('search/specials', 'SearchController@specials')->name('search.specials');
Route::get('search/under/10', 'SearchController@underTen')->name('search.under.10');
Route::get('search/under/25', 'SearchController@underTwentyFive')->name('search.under.25');

Route::get('/time-is-the-enemy', function () {

	return redirect()->away('https://www.youtube.com/watch?v=nvUeo5sagkA');

})->name('quantic.time');
