<?php

//view of home page with recent articles
Route::get('/', 'ArticleController@latestPost')->name('home');

//login view
Route::get('/login', function () {
    return view('login');
})->name('login');
//authentification
Route::post('/login/logincheck', 'MakeLoginController@logincheck');
Route::get('/logout', 'MakeLoginController@getLogout');

//show register form
Route::get('/register', function () {
    return view('register');
})->name('register');
//validation for register form
//save user registration data, return to login
Route::post('/register/create', 'CreateUserController@store');

//show articles page,  list of all articles 
Route::get('/articles/articlesAll', 'ArticleController@show')->name('articles.articlesAll');
//show single article
Route::get('/articles/{id}', 'ArticleController@open')->name('articles.open');


//pages where need authentification
Route::group(['middleware' => ['auth']], function () {
// view for create page
Route::get('/articles/0/createArticle', 'ArticleController@modify');
//Function to created or modified article
Route::post('/articles/done', 'ArticleController@createArticle');
//function to delete article
Route::post('/articles/{id}/delete', 'ArticleController@delete');
//function to edit article
Route::post('/articles/{id}/edit', ['as' => 'articles.edit', 'uses' => 'ArticleController@edit']);
Route::put('/articles/{id}/update', 'ArticleController@update')->name('articles.update');
});

