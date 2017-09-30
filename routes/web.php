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

// Pages routes
Route::get('/', 'ContentController@index');
Route::get('/la-struttura/{anchor?}', 'ContentController@struttura');
Route::get('/attivita', 'ContentController@attivita');
Route::get('/accoglienza', 'ContentController@accoglienza');
Route::get('/medici', 'ContentController@medici');
Route::get('/contatti', 'ContentController@contatti');
Route::get('/news', 'ContentController@news');

// Language route
Route::post('language-chooser', 'LanguageController@changeLanguage');

Route::post('/language/', array(
        'before' => 'csrf',
        'as' => 'language-chooser',
        'uses' => 'LanguageController@changeLanguage',
    )
);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
