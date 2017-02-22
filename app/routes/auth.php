<?php

//Settings Profile
Route::get('settings/profile', ['as' => 'settings_profile', 'uses' => 'UsersController@settings_profile']);
Route::put('settings/profile', ['as' => 'settings_profile_update', 'uses' => 'UsersController@settings_profile_update']);    
//Settings Password
Route::get('settings/password', ['as' => 'settings_password', 'uses' => 'UsersController@settings_password']);
Route::put('settings/password', ['as' => 'settings_password_update', 'uses' => 'UsersController@settings_password_update']);    
//Settings Payment
Route::get('settings/payment', ['as' => 'settings_payment', 'uses' => 'UsersController@settings_payment']);
Route::put('settings/payment', ['as' => 'settings_payment_update', 'uses' => 'UsersController@settings_payment_update']);
//Settings Avatar
Route::get('settings/avatar', ['as' => 'settings_avatar', 'uses' => 'UsersController@settings_avatar']);
Route::put('settings/avatar', ['as' => 'settings_avatar_update', 'uses' => 'UsersController@settings_avatar_update']);

//Settings Email, PENDIENTE
//Route::get('settings/email', ['as' => 'settings_email', 'uses' => 'UsersController@settings_email']);
//Route::put('settings/email', ['as' => 'settings_email_update', 'uses' => 'UsersController@settings_email_update']);

//Settings Confirm Email
Route::get('settings/confirmemail', ['as' => 'confirm_email', 'uses' => 'UsersController@confirm_email']);
Route::put('settings/confirmemail', ['as' => 'confirm_email_update', 'uses' => 'UsersController@confirm_email_update']);
//SendPost
Route::get('i/share', ['as' => 'share', 'uses' => 'PostController@share']);
Route::post('i/share', ['as' => 'share_post', 'uses' => 'PostController@share_post']);
//SendPostImage
Route::get('i/share/image', ['as' => 'share_image', 'uses' => 'PostController@share_image']);
Route::post('i/share/image', ['as' => 'share_image_post', 'uses' => 'PostController@share_image_post']);
//Logout
Route::get('i/logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
//Discover
Route::get('i/discover', ['as' => 'discover', 'uses' => 'ProfileController@discover']);
//Apply
Route::get('i/apply', ['as' => 'apply', 'uses' => 'UsersController@apply']);
Route::post('i/apply', ['as' => 'apply_register', 'uses' => 'UsersController@apply_register']);

//Followers
Route::get('ajax/follow', ['as' => 'follow', 'uses' => 'AjaxController@follow']);
Route::get('ajax/unfollow', ['as' => 'unfollow', 'uses' => 'AjaxController@unfollow']);
//Favs
Route::get('ajax/fav', ['as' => 'fav', 'uses' => 'AjaxController@fav']);
Route::get('ajax/unfav', ['as' => 'unfav', 'uses' => 'AjaxController@unfav']);
//Reposts
Route::get('ajax/repost', ['as' => 'repost', 'uses' => 'AjaxController@repost']);
Route::get('ajax/unrepost', ['as' => 'unrepost', 'uses' => 'AjaxController@unrepost']);




