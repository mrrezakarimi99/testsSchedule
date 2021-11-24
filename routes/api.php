<?php

use Illuminate\Support\Facades\Route;

Route::post('v1/login' , 'Api\V1\Auth\AuthController@login');
Route::post('v1/register' , 'Api\V1\Auth\AuthController@register');
