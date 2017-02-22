<?php

Route::get('i/admin', ['as' => 'admin', 'uses' => 'AdminController@home']);

//Aprobar partners
Route::get('i/admin/partners', ['as' => 'admin_partners', 'uses' => 'AdminController@partners']);
Route::get('ajax/xCode', ['as' => 'admin_partners_update', 'uses' => 'AjaxController@xCode']);
//Aprobar numeros
Route::get('i/admin/numbers', ['as' => 'admin_numbers', 'uses' => 'AdminController@numbers']);
Route::get('ajax/numbA', ['as' => 'admin_numbers_update', 'uses' => 'AjaxController@numbA']);
//Mandar email marketing
Route::get('i/admin/marketing', ['as' => 'admin_marketing', 'uses' => 'AdminController@email_marketing']);
Route::post('i/admin/marketing', ['as' => 'admin_marketing_send', 'uses' => 'AdminController@email_marketing_send']);
//Mandar email 
Route::get('i/admin/email', ['as' => 'admin_email', 'uses' => 'AdminController@email']);
Route::post('i/admin/email', ['as' => 'admin_email_send', 'uses' => 'AdminController@email_send']);
//Mandar email a los usuarios
Route::get('i/admin/users', ['as' => 'admin_users', 'uses' => 'AdminController@email_users']);
Route::post('i/admin/users', ['as' => 'admin_users_send', 'uses' => 'AdminController@email_users_send']);