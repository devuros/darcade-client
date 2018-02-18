<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('community', 'HomeController@community')->name('community');
Route::get('support', 'HomeController@support')->name('support');
Route::post('contact', 'HomeController@contact')->name('contact');
Route::get('author', 'HomeController@author')->name('author');

Route::get('login', 'AuthController@showLoginForm')->name('login');
Route::post('login', 'AuthController@login');

Route::get('register', 'AuthController@register')->name('register');

Route::get('games/{id}', 'GameController@show')->name('games.show');

Route::get('genres/{id}/games', 'GenreController@showGenreGames')->name('genres.showGenreGames');

Route::get('developers/{id}/games', 'DevController@showDeveloperGames')->name('developers.showDeveloperGames');

Route::get('publishers/{id}/games', 'PubController@showPublisherGames')->name('publishers.showPublisherGames');

Route::get('search/top-sellers', 'SearchController@topSellers')->name('search.top');
Route::get('search/new-releases', 'SearchController@newReleases')->name('search.new');
Route::get('search/specials', 'SearchController@specials')->name('search.specials');
Route::get('search/under/10', 'SearchController@underTen')->name('search.under.10');
Route::get('search/under/25', 'SearchController@underTwentyFive')->name('search.under.25');

Route::get('/time-is-the-enemy', function () {

	return redirect()->away('https://www.youtube.com/watch?v=nvUeo5sagkA');

})->name('quantic.time');
