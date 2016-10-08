<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('teste');
});*/

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@index');

    Route::controller('agendamentos', 'AgendamentosController');

    Route::get('users/edit/{id}', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
    Route::put('users/update/{id}', ['as' => 'users.update', 'uses' => 'UsersController@update']);
    Route::get('users/passsword/{id}', ['as' => 'users.password', 'uses' => 'UsersController@password']);
    Route::put('users/passsword-update/{id}', ['as' => 'users.password.update', 'uses' => 'UsersController@passwordUpdate']);

    Route::group(['middleware' => 'check.level:2'], function () {

        Route::get('users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
        Route::get('users/create', ['as' => 'users.create', 'uses' => 'UsersController@create']);
        Route::post('users/store', ['as' => 'users.store', 'uses' => 'UsersController@store']);
        Route::get('users/delete/{id}', ['as' => 'users.delete', 'uses' => 'UsersController@delete']);
        Route::delete('users/destroy/{id}', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);

        Route::get('veiculos', ['as' => 'veiculos.index', 'uses' => 'VeiculosController@index']);
        Route::get('veiculos/create', ['as' => 'veiculos.create', 'uses' => 'VeiculosController@create']);
        Route::post('veiculos/store', ['as' => 'veiculos.store', 'uses' => 'VeiculosController@store']);
        Route::get('veiculos/edit/{id}', ['as' => 'veiculos.edit', 'uses' => 'VeiculosController@edit']);
        Route::put('veiculos/update/{id}', ['as' => 'veiculos.update', 'uses' => 'VeiculosController@update']);
        Route::get('veiculos/delete/{id}', ['as' => 'veiculos.delete', 'uses' => 'VeiculosController@delete']);
        Route::delete('veiculos/destroy/{id}', ['as' => 'veiculos.destroy', 'uses' => 'VeiculosController@destroy']);

        Route::get('cargos', ['as' => 'cargos.index', 'uses' => 'CargosController@index']);
        Route::get('cargos/create', ['as' => 'cargos.create', 'uses' => 'CargosController@create']);
        Route::post('cargos/store', ['as' => 'cargos.store', 'uses' => 'CargosController@store']);
        Route::get('cargos/edit/{id}', ['as' => 'cargos.edit', 'uses' => 'CargosController@edit']);
        Route::put('cargos/update/{id}', ['as' => 'cargos.update', 'uses' => 'CargosController@update']);
        Route::get('cargos/delete/{id}', ['as' => 'cargos.delete', 'uses' => 'CargosController@delete']);
        Route::delete('cargos/destroy/{id}', ['as' => 'cargos.destroy', 'uses' => 'CargosController@destroy']);

        Route::resource('servidores', 'ServidoresController');
        Route::get('servidores/{id}/delete', ['as' => 'servidores.delete', 'uses' => 'ServidoresController@delete']);



    });


    /*Route::resource('agendamentos','AgendamentosController');
    Route::get('agendamentos/{id}/delete', ['as'=>'agendamentos.delete', 'uses'=>'AgendamentosController@delete']);
    Route::get('agendamentos/pendentes', ['as'=>'agendamentos.pendentes', 'uses'=>'AgendamentosController@pendentes']);
    Route::get('agendamentos/aprovados', ['as'=>'agendamentos.aprovados', 'uses'=>'AgendamentosController@aprovados']);
    Route::get('agendamentos/recusados', ['as'=>'agendamentos.recusados', 'uses'=>'AgendamentosController@recusados']);
    Route::post('agendamentos/search', ['as'=>'agendamentos.search', 'uses'=>'AgendamentosController@search']);*/

});
