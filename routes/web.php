<?php
Auth::routes();

// Static Pages
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/avisos', 'HomeController@avisos')->name('home.avisos');
Route::get('/prestacao-de-contas', 'HomeController@contas')->name('home.contas');
Route::get('/imagens', 'HomeController@imagens')->name('home.imagens');

// Admin
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('admin.index');
    Route::resource('avisos', 'AvisoController');
    Route::resource('contas', 'ContaController');
    Route::resource('imagens', 'ImagemController');
});