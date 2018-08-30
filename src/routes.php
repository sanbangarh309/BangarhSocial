<?php
Route::group(['namespace' => 'sandeep\BangarhSocial\Controllers'], function()
{
	Route::get('/fb', 'ButtonController@facebook');
	Route::get('/', 'ButtonController@index');
    Route::match(['get', 'post'], '/api/sauth', 'FbController@sanAuthorization');
    Route::match(['get', 'post'], '/api/line', 'LineController@sanAuthorization');
    // Route::match(['get', 'post'], '/api/telegram', function(){
    // 	return App::call('TelegramController@sanSendMessage');
    // });
    Route::match(['get', 'post'], '/api/telegram', 'TelegramController@getMe');
    Route::match(['get', 'post'], '/api/slack', 'SlackController@sanSendMessage');
	// Route::get('/admin', 'AdminController@index');
});

?>
