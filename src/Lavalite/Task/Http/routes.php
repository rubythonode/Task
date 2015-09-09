<?php
Route::group(array('prefix' =>'admin'), function ()
{
    Route::get('/task/task/list', 'Lavalite\Task\Http\Controllers\TaskAdminController@lists');
    Route::resource('/task/task', 'Lavalite\Task\Http\Controllers\TaskAdminController');
});

Route::get('task', 'Lavalite\Task\Controllers\PublicController@list');
Route::get('task/{slug?}', 'Lavalite\Task\Controllers\PublicController@details');