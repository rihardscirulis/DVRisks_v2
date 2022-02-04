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

Route::get('/', function () {
    return view('application.index');
});

Route::get('/sakums', function () {
    return view('welcome.index');
});

Route::get('/factorgroup', 'FactorGroupController@index');
Route::post('/factorgroup', 'FactorGroupController@store');
Route::get('/factorgroup/destroy/{factorGroup}', 'FactorGroupController@destroy');
Route::get('/factorgroup/edit/{factorGroup}', 'FactorGroupController@edit');
Route::put('/factorgroup/update/{factorGroup}', 'FactorGroupController@update');

Route::get('/factor', 'FactorController@index');
Route::post('/factor', 'FactorController@store');
Route::get('/factor/destroy/{factor}', 'FactorController@destroy');
Route::get('/factor/edit/{factor}', 'FactorController@edit');
Route::put('/factor/update/{factor}', 'FactorController@update');

Route::get('/authority', 'AuthorityController@index');
Route::post('/authority', 'AuthorityController@store');
Route::get('/authority/destroy/{authority}', 'AuthorityController@destroy');
Route::get('/authority/edit/{authority}', 'AuthorityController@edit');
Route::put('/authority/update/{authority}', 'AuthorityController@update');

Route::get('/environment', 'EnvironmentController@index');
Route::post('/environment', 'EnvironmentController@store');
Route::get('/environment/destroy/{environment}', 'EnvironmentController@destroy');
Route::get('/environment/edit/{environment}', 'EnvironmentController@edit');
Route::put('/environment/update/{environment}', 'EnvironmentController@update');

Route::get('/position', 'PositionController@index');
Route::post('/position', 'PositionController@store');
Route::get('/position/destroy/{environment}', 'PositionController@destroy');
Route::get('/position/edit/{environment}', 'PositionController@edit');
Route::put('/position/update/{environment}', 'PositionController@update');

Route::get('/personnel', 'PersonnelController@index');
Route::post('/personnel', 'PersonnelController@store');
Route::get('/personnel/destroy/{environment}', 'PersonnelController@destroy');
Route::get('/personnel/edit/{environment}', 'PersonnelController@edit');
Route::put('/personnel/update/{environment}', 'PersonnelController@update');

Route::get('/evaluation_document', 'Evaluation_DocumentController@index');
Route::post('/evaluation_document', 'Evaluation_DocumentController@store');

Auth::routes();
