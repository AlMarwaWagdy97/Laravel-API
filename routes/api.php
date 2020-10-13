<?php

use App\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('login', 'Users@login');


// new vediooooooooooooooooooooooooooooooooooooooooooooooooooooooo
Route::group(['middleware'=>['api', 'CheckPassword_Api', 'ChangeLanguage_Api']], function(){
    Route::post('GetMainCategory', 'CategpriesController@index');
    Route::post('getcategorybyID', 'CategpriesController@getcategorybyID');
    Route::post('ChangecategoryStatue', 'CategpriesController@ChangeStatues');
    
    Route::group(['prefix' => 'admin', 'namespace'=>'Admin'], function(){
        Route::post('login', 'AuthController@login');
    });

});


Route::group(['middleware'=>['api', 'CheckPassword_Api', 'ChangeLanguage_Api', 'checkAdminToken:admin_api']], function(){
    Route::get('offers', 'CategpriesController@index');
});