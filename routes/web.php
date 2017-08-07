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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    Route::get('/directora/profesores', 'Principal\ProfessorController@index');
    Route::get('/directora/administradores', 'Principal\AdminsController@index');
    Route::get('/directora/grados', 'Principal\GradesController@index');

    //to save and get data
    //------------------------------------------------------------------------------------------------------------------
    Route::get('/datatable/profesores', 'Principal\ProfessorController@getProfessors')->name('datatable.professors');
    Route::post('/save/professor', ['as'   => 'save.professor.data',
                                   'uses' => 'Principal\ProfessorController@save']);

    Route::get('/datatable/grados', 'Principal\GradesController@getGrades')->name('datatable.grades');
    Route::post('/save/grades', ['as'   => 'save.grade.data',
                                    'uses' => 'Principal\GradesController@save']);

    Route::get('/datatable/administradores', 'Principal\AdminsController@getAdministrators')->name('datatable.administrators');
    Route::post('/save/administrators', ['as'   => 'save.administrator.data',
                                    'uses' => 'Principal\AdminsController@save']);
    //------------------------------------------------------------------------------------------------------------------
});