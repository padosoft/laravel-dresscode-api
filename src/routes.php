<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/dresscode/order', function () {
        return 'Hello from my package!';
    });
});

