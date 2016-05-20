<?php

// Admin routes for task
Route::group(['prefix' => trans_setlocale() . '/admin/task'], function () {
    Route::resource('task', 'TaskAdminWebController');
});
