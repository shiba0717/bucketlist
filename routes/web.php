<?php

Route::get('/', 'PostsController@index')->name('top');

Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);

Route::resource('comments', 'CommentsController', ['only' => ['store']]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mypage', 'MypageController@index');

Route::post('/add/{id}', 'MyBucketController@add')->name('add');

Route::post('/done/{id}', 'MyBucketController@done')->name('done');

Route::get('/ideas', 'IdeasController@index')->name('idea');

Route::get('/ideas/done', 'IdeasController@done')->name('idea_done');



