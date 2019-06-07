<?php
use App\Task;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// トップページ
Route::get('/', 'FrontController@index');

Route::get('/quiz', 'FrontController@question');

Route::post('/answer', 'FrontController@answer');

Route::get('/result', 'FrontController@result');

Route::get('/hint/{type}', 'FrontController@hint');
