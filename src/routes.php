<?php
Route::group(['namespace' => 'sandeep\BangarhSocial\Controllers'], function()
{
	Route::get('/', 'ButtonController@index');
    Route::match(['get', 'post'], '/api/sauth', 'FbController@sanAuthorization');
    Route::match(['get', 'post'], '/api/lauth', 'LineController@sanAuthorization');
	// Route::get('/admin', 'AdminController@index');
})

?>