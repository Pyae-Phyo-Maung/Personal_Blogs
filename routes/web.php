<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Admin
Route::group(['prefix'=>'admin','middleware'=>['auth','isAdmin']],function(){
    //User
    Route::get('/dashboard','admin\AdminDashboardController@index');
    Route::get('/users','admin\UserController@index');
    Route::get('users/{id}/edit','admin\UserController@edit');
    Route::post('users/{id}/update','admin\UserController@update');
    Route::post('users/{id}/delete','admin\UserController@delete');
    //Skill
    Route::resource('skills','admin\SkillController');
    Route::get('skill/createpdf','admin\SkillController@createPdf');
    //Project
    Route::resource('projects','admin\ProjectController');
    //Student_Count
    Route::get('/student_counts','admin\StudentCountController@index');
    Route::post('/student_counts/store','admin\StudentCountController@store');
    Route::post('/student_counts/{id}/update','admin\StudentCountController@update');
    //Category
    Route::resource('categories','admin\CategoryController');
    //Post
    Route::resource('posts','admin\PostController');
    Route::get('post/createpdf','admin\PostController@createPdf');
    Route::get('post/export/', 'admin\PostController@export');
    Route::post('comment/{id}/show_hide','admin\PostController@showHideComment');
});

Route::get('/','UiController@index');
Route::get('/posts','UiController@post');
Route::get('posts/{id}/post-details','UiController@post_detail');
Route::post('post/like/{postId}','LikesDislikeController@like');
Route::post('post/dislike/{postId}','LikesDislikeController@dislike');
Route::get('post_search','UiController@search');
Route::get('search_by_category/{id}','UiController@searchCategory');
Route::post('post/comment/{postId}','CommentController@comment');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
