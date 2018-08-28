<?php
Route::group(['namespace' => 'sandeep\BangarhSocial\Controllers'], function()
{
	Route::get('/', 'ButtonController@index');
    Route::match(['get', 'post'], '/api/sauth', 'FbController@sanAuthorization');
    Route::match(['get', 'post'], '/api/line', 'LineController@sanAuthorization');
    // Route::match(['get', 'post'], '/api/telegram', function(){
    // 	return App::call('TelegramController@sanSendMessage');
    // });
    Route::match(['get', 'post'], '/api/telegram', 'TelegramController@sanSendMessage');
	// Route::get('/admin', 'AdminController@index');
});

?>