<?php

//Login
Route::get('i/login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::post('i/login_send', ['as' => 'login_send', 'uses' => 'AuthController@login_send']);

//Signup
Route::get('i/signup', ['as' => 'signup', 'uses' => 'UsersController@signup']);
Route::post('i/signup', ['as' => 'signup_register', 'uses' => 'UsersController@signup_register']);
