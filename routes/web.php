<?php
Auth::routes(['register' => false]);

// Static Pages
Route::get('/', 'HomeController@index')->name('home.index');
// Diretoria
Route::get('/diretoria', 'HomeController@showDiretoria')->name('home.diretoria.index');

// EMail
Route::post('/send-email', 'HomeController@contatoMail')->name('email.send');

// Avisos
Route::get('/avisos', 'HomeController@showAllAvisos')->name('home.avisos.index');
Route::get('/avisos/{id}', 'HomeController@showAviso')->name('home.avisos.show');

// Contas
Route::get('/prestacao-de-contas', 'HomeController@showYearsContas')->name('home.contas.index');
Route::get('/prestacao-de-contas/{year}', 'HomeController@showMonthsContas')->name('home.contas.months');
Route::get('/prestacao-de-contas/{month}/{year}', 'HomeController@showConta')->name('home.contas.show');

// Imagens
Route::get('/albuns', 'HomeController@showAllAlbuns')->name('home.albuns.index');
Route::get('/albuns/{albumId}', 'HomeController@showAlbum')->name('home.imagens.show');

// Admin
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('admin.index');
    Route::resource('avisos', 'AvisoController');
    Route::resource('contas', 'ContaController');
    Route::resource('imagens', 'ImagemController');
});