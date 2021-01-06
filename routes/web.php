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

Route::get('/profile','UserController@profile');
Route::post('/profile','UserController@update_avatar');
Route::get('/search','CvController@search');
Route::get('/about','CvController@about');

Route::get('cvs','CvController@index');
Route::get('cvs/create','CvController@create');
Route::post('cvs','CvController@store');
Route::get('cvs/{id}/edit','CvController@edit');
Route::put('cvs/{id}','CvController@update');
Route::get('cvs/{id}','CvController@destroy');
Route::get('cvs/{id}/show','CvController@show');

//Route::resource('/cvs','CvController')->except(['show']);	//remplace les 6 routes au-dessus

Route::get('/getExperiences/{id}','CvController@getExperiences');
Route::post('/addExperiences','CvController@addExperience');
Route::put('/updateExperience','CvController@updateExperience');
Route::delete('/deleteExperience/{id}','CvController@deleteExperience');


Route::get('/getFormations/{id}','CvController@getFormations');
Route::post('/addFormations','CvController@addFormations');
Route::put('/updateFormations','CvController@updateFormations');
Route::delete('/deleteFormations/{id}','CvController@deleteFormations');


Route::get('/getCompetences/{id}','CvController@getCompetences');
Route::post('/addCompetences','CvController@addCompetences');
Route::put('/updateCompetences','CvController@updateCompetences');
Route::delete('/deleteCompetences/{id}','CvController@deleteCompetences');



Route::get('/getLangues/{id}','CvController@getLangues');
Route::post('/addLangues','CvController@addLangues');
Route::put('/updateLangues','CvController@updateLangues');
Route::delete('/deleteLangues/{id}','CvController@deleteLangues');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

