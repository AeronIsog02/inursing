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

header("Cache-Control: no-store, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['author']], function () {
	Route::get('/author', function () {
		session()->forget('article_id');
		session()->regenerate();
	    return view('author.author');
	});

	Route::get('/author/step1', function () {
	    return view('author.step1');
	});

	Route::get('/author/step2', function () {
	    if (session('article_id')) {
			# code...
	    	return view('author.step2');
		}else{
			return redirect('/author');
		}
	});

	Route::get('/author/step3', 'ArticleController@index');
	Route::get('/author/dashboard', 'AuthorDashboardController@index');

	Route::get('/author/step4', function () {
	    if (session('article_id')) {
			# code...
	    	return view('author.step4');
		}else{
			return redirect('/author');
		}
	});
	// Articles

	Route::post('/article_type_form','ArticleController@create_article');
	Route::post('/article_form','ArticleController@saveArticle')->name('article_upload');
	Route::post('/author_form','AuthorController@save_author')->name('author_upload');
	Route::put('/update_article','ArticleController@update_article')->name('update_article');
	Route::put('/update_article_details','ArticleController@update_article_details')->name('update_article_details');
	Route::delete('/delete_all_articles', 'ArticleController@delete_all');
	Route::post('/copyright_form','CopyrightController@save_copyright')->name('copyright_save');

	// Submissions

	Route::get('/author/step5', 'SubmissionController@index');
	Route::post('/submit_article','SubmissionController@submit_article')->name('submit_article');
});
