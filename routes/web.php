<?php
Auth::routes(['register' => false]);

// Static Pages
Route::get('/', 'HomeController@index')->name('home.index');

// Diretoria
Route::get('/diretoria', 'HomeController@showDiretoria')->name('home.diretoria.index');

// Email
Route::post('/send-email', 'HomeController@contatoMail')->name('email.send');

// Avisos
Route::get('/avisos', 'HomeController@showAllAvisos')->name('home.avisos.index');
Route::get('/avisos/{id}', 'HomeController@showAviso')->name('home.avisos.show');

// Estatuto
Route::get('/estatuto', 'HomeController@showEstatuto')->name('home.estatuto.index');

// Contas
Route::get('/prestacao-de-contas', 'HomeController@showYearsContas')->name('home.contas.index');
Route::get('/prestacao-de-contas/{year}', 'HomeController@showMonthsContas')->name('home.contas.months');
Route::get('/prestacao-de-contas/{month}/{year}', 'HomeController@showConta')->name('home.contas.show');

// Imagens
Route::get('/albuns', 'HomeController@showAllAlbuns')->name('home.albuns.index');
Route::get('/albuns/{albumId}', 'HomeController@showSubAlbuns')->name('home.albuns.show');
Route::get('/albuns/{albumId}/{subalbumid}', 'HomeController@showImagens')->name('home.albuns.imagens');

// Funcionários
Route::get('funcionarios', 'HomeController@showFuncionarios')->name('home.funcionarios.index');

// Contato
Route::get('contato', 'HomeController@showContato')->name('home.contato.index');

// Horário
Route::get('horario', 'HomeController@showHorario')->name('home.horario.index');

// Admin
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('admin.index');
    Route::resource('avisos', 'AvisoController');
    Route::resource('contas', 'ContaController');
    Route::resource('imagens', 'ImagemController');
    Route::resource('albums', 'AlbumController');

    // sub albums
    Route::get('albums/{id}/create', 'SubAlbumController@create')->name('sub-albums.create');
    Route::get('sub-albums/{id}', 'SubAlbumController@show')->name('sub-albums.show');
    Route::post('albums/sub/create', 'SubAlbumController@store')->name('sub-albums.store');

});