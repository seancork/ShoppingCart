<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('removed', 'ApiController@getAllRemovedProducts');

Route::get('removed/{range}', 'ApiController@getDateRange');

Route::get('removed/{range}/name/{product}', 'ApiController@getRemovedProductsByNameAndDateRange');

Route::get('removed/name/{product}', 'ApiController@getRemovedProductsByName');

