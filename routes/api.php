<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['verified'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboardApi');

    Route::get('/boards', 'BoardController@boards')->name('boardsApi.all');
    Route::put('/board/update/{id}', 'BoardController@updateBoard')->name('boardsApi.update');
    Route::post('/board/add/', 'BoardController@addBoard')->name('boardsApi.add');
    Route::delete('/board/delete/{id}', 'BoardController@deleteBoard')->name('boardsApi.delete');
    Route::get('/board/{id}', 'BoardController@board')->name('boardApi.view');

    Route::post('/board/{id}/addtask', 'BoardController@addTask')->name('tasksApi.add');
    Route::put('/task/update/{id}', 'BoardController@updateTask')->name('tasksApi.update');
    Route::delete('/task/delete/{id}', 'BoardController@deleteTask')->name('tasksApi.delete');
});
