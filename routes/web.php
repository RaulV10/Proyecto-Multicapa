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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],  function(){
  Route::get('/menu','MenuController@index');
  Route::get('/create/menu','MenuController@create');
  Route::post('/create/menu','MenuController@store');
  Route::get('/edit/menu/{id}','MenuController@edit');
  Route::patch('/edit/menu/{id}','MenuController@update');
  Route::delete('/delete/menu/{id}','MenuController@destroy');
  Route::get('/menu/{id}', 'MenuController@show');

  Route::get('/food', 'FoodController@index');
  Route::get('/create/food/{menu_id}','FoodController@create');
  Route::post('/create/food','FoodController@store');
  Route::get('/edit/food/{id}','FoodController@edit');
  Route::patch('/edit/food/{id}','FoodController@update');
  Route::delete('/delete/food/{id}','FoodController@destroy');

  Route::get('/drink', 'DrinkController@index');
  Route::get('/create/drink/{menu_id}','DrinkController@create');
  Route::post('/create/drink','DrinkController@store');
  Route::get('/edit/drink/{id}','DrinkController@edit');
  Route::patch('/edit/drink/{id}','DrinkController@update');
  Route::delete('/delete/drink/{id}','DrinkController@destroy');
});
