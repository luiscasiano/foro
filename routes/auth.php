<?php
/**
 * Created by PhpStorm.
 * User: piscouser
 * Date: 16/01/2017
 * Time: 03:37 AM
 */


//Posts
Route::get('posts/create',[
    'uses' => 'CreatePostController@create',
    'as' => 'posts.create'
]);

Route::post('posts/create',[
    'uses' => 'CreatePostController@store',
    'as' => 'posts.store'
]);