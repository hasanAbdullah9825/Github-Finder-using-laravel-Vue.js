<?php

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

Route::get('/', function () {
  
    return view('welcome');
});

Route::get('/get_github_userlist','GithubController@getGitUserList');
Route::get('/get_github_user_details/{username}','GithubController@getGitUserDetails');

