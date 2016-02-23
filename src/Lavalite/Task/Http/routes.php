<?php

// Admin routes for task
Route::group(['prefix' => trans_setlocale().'/admin/task', 'middleware' => ['web', 'auth.role:admin']], function () {
    Route::resource('task', 'TaskAdminController');
});