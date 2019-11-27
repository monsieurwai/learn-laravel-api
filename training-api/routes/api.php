<?php

use Illuminate\Http\Request;
// use Symfony\Component\Routing\Route
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

/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
*/

Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Articles
|--------------------------------------------------------------------------
*/
//get all articles
Route::get('articles', 'ArticleController@getAllArticles');

//get article by id
Route::get('article/{id}', 'ArticleController@getArticle');

//create articles
Route::post('articles', 'ArticleController@createArticle');

//update articles
Route::put('article/{id}', 'ArticleController@updateArticle');

//delete articles
Route::delete('article/{id}', 'ArticleController@deleteArticle');
