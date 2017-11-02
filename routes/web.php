<?php

Route::get('/', 'PostController@index')->name('home'); // Homepage
Route::get('/posts/create', 'PostController@create'); // Post creation page
Route::get('/posts/{post}', 'PostController@show'); // Show a single Post
Route::get('/register', 'RegistrationController@create'); // User registration page
Route::get('/login', 'SessionsController@create'); // Login page
Route::get('/posts/tags/{tag}', 'TagsController@index'); // Show posts with tag {tag}
Route::get('/logout', 'SessionsController@destroy'); // Log User out

Route::post('/posts', 'PostController@store'); // Save new Post to the DB
Route::post('/posts/{post}/comments', 'CommentsController@store'); // Save new Comment to the DB
Route::post('/register', 'RegistrationController@store'); // Save new User to the DB
Route::post('/login', 'SessionsController@store'); // Start a new Session (log User in)
