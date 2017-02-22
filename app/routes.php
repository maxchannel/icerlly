<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('i/welcome', ['as' => 'welcome', 'uses' => 'PublicController@welcome']);
Route::get('i/welcome/action', ['as' => 'welcome_action', 'uses' => 'PublicController@action']);

//Profile
Route::get('{username}', ['as' => 'profile', 'uses' => 'ProfileController@show']);
Route::get('{username}/post/{id}', ['as' => 'post', 'uses' => 'ProfileController@post']);
Route::get('{username}/followers', ['as' => 'followers', 'uses' => 'ProfileController@followers']);
Route::get('{username}/following', ['as' => 'following', 'uses' => 'ProfileController@following']);

//Info
Route::get('i/guide', ['as' => 'guide', 'uses' => 'PublicController@showGuide']);
Route::get('i/feature', ['as' => 'feature', 'uses' => 'PublicController@showFeature']);
Route::get('i/ads', ['as' => 'ads', 'uses' => 'PublicController@ads']);

//Search
Route::get('i/search', ['as' => 'search', 'uses' => 'PublicController@search']);
Route::get('i/search/results', ['as' => 'search-results', 'uses' => 'AjaxController@search']);

Route::get('i/search-t', ['as' => 'search_t', 'uses' => 'PublicController@search_t']);
Route::get('i/search/results-t', ['as' => 'search-results_t', 'uses' => 'AjaxController@search_t']);

//Auth Users
Route::group(['before'=>'auth'], function(){

	require(__DIR__.'/routes/auth.php');

    Route::group(['before'=>'is_admin'], function() {
    	require(__DIR__.'/routes/admin.php');
    });

});

//Guest Users
Route::group(['before'=>'guest'], function () {

	require(__DIR__.'/routes/guest.php');

});

//API
Route::group(array('prefix' => 'api', 'before' => 'auth.basic'), function(){

    Route::resource('posts', 'UrlController');

});