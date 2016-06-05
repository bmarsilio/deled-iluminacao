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

Route::group(['prefix' => '/admin'], function() {

    Route::get('/', ['as' => 'admin', 'middleware' => 'auth', 'uses' => 'AdminController@index']);

    Route::group(['prefix' => '/cadastros'], function() {

        Route::group(['prefix' => '/banners'], function() {
            Route::get('/', ['as' => 'admin.cadastros.banners.grid', 'uses' => 'BannersController@grid']);
            Route::get('/create', ['as' => 'admin.cadastros.banners.create', 'uses' => 'BannersController@create']);
            Route::post('/store', ['as' => 'admin.cadastros.banners.store', 'uses' => 'BannersController@storeBanner']);
            Route::get('/destroy/{id}', ['as' => 'admin.cadastros.banners.destroy', 'uses' => 'BannersController@destroyBanner']);
        });

        Route::group(['prefix' => '/home'], function() {
            Route::get('/', ['as' => 'admin.cadastros.home.grid', 'uses' => 'HomeController@grid']);
            Route::get('/create', ['as' => 'admin.cadastros.home.create', 'uses' => 'HomeController@create']);
            Route::post('/store', ['as' => 'admin.cadastros.home.store', 'uses' => 'HomeController@store']);
            Route::get('/edit/{id}', ['as' => 'admin.cadastros.home.edit', 'uses' => 'HomeController@edit']);
            Route::put('/update/{id}', ['as' => 'admin.cadastros.home.update', 'uses' => 'HomeController@update']);
            Route::get('/destroy/{id}', ['as' => 'admin.cadastros.home.destroy', 'uses' => 'HomeController@destroy']);

            Route::group(['prefix' => '/imagens'], function() {
                Route::get('/{id}', ['as' => 'admin.cadastros.home.imagens', 'uses' => 'HomeController@imagens']);
                Route::get('/create/{id}', ['as' => 'admin.cadastros.home.imagens.create', 'uses' => 'HomeController@createImagem']);
                Route::post('/store/{id}', ['as' => 'admin.cadastros.home.imagens.store', 'uses' => 'HomeController@storeImagem']);
                Route::get('/destroy/{id}', ['as' => 'admin.cadastros.home.imagens.destroy', 'uses' => 'HomeController@destroyImagem']);
            });
        });

        Route::group(['prefix' => '/rede-social'], function() {
            Route::get('/', ['as' => 'admin.cadastros.rede-social.grid', 'uses' => 'RedeSocialController@grid']);
            Route::get('/create', ['as' => 'admin.cadastros.rede-social.create', 'uses' => 'RedeSocialController@create']);
            Route::post('/store', ['as' => 'admin.cadastros.rede-social.store', 'uses' => 'RedeSocialController@store']);
            Route::get('/edit/{id}', ['as' => 'admin.cadastros.rede-social.edit', 'uses' => 'RedeSocialController@edit']);
            Route::put('/update/{id}', ['as' => 'admin.cadastros.rede-social.update', 'uses' => 'RedeSocialController@update']);
            Route::get('/destroy/{id}', ['as' => 'admin.cadastros.rede-social.destroy', 'uses' => 'RedeSocialController@destroy']);
        });

        Route::group(['prefix' => '/noticia'], function() {
            Route::get('/', ['as' => 'admin.cadastros.noticia.grid', 'uses' => 'NoticiaController@grid']);
            Route::get('/create', ['as' => 'admin.cadastros.noticia.create', 'uses' => 'NoticiaController@create']);
            Route::post('/store', ['as' => 'admin.cadastros.noticia.store', 'uses' => 'NoticiaController@store']);
            Route::get('/edit/{id}', ['as' => 'admin.cadastros.noticia.edit', 'uses' => 'NoticiaController@edit']);
            Route::put('/update/{id}', ['as' => 'admin.cadastros.noticia.update', 'uses' => 'NoticiaController@update']);
            Route::get('/destroy/{id}', ['as' => 'admin.cadastros.noticia.destroy', 'uses' => 'NoticiaController@destroy']);

            Route::group(['prefix' => '/imagens'], function() {
                Route::get('/{id}', ['as' => 'admin.cadastros.noticia.imagens', 'uses' => 'NoticiaController@imagens']);
                Route::get('/create/{id}', ['as' => 'admin.cadastros.noticia.imagens.create', 'uses' => 'NoticiaController@createImagem']);
                Route::post('/store/{id}', ['as' => 'admin.cadastros.noticia.imagens.store', 'uses' => 'NoticiaController@storeImagem']);
                Route::get('/destroy/{id}', ['as' => 'admin.cadastros.noticia.imagens.destroy', 'uses' => 'NoticiaController@destroyImagem']);
            });
        });

        Route::group(['prefix' => '/categoria'], function() {
            Route::get('/', ['as' => 'admin.cadastros.categoria.grid', 'uses' => 'CategoriaController@grid']);
            Route::get('/create', ['as' => 'admin.cadastros.categoria.create', 'uses' => 'CategoriaController@create']);
            Route::post('/store', ['as' => 'admin.cadastros.categoria.store', 'uses' => 'CategoriaController@store']);
            Route::get('/edit/{id}', ['as' => 'admin.cadastros.categoria.edit', 'uses' => 'CategoriaController@edit']);
            Route::put('/update/{id}', ['as' => 'admin.cadastros.categoria.update', 'uses' => 'CategoriaController@update']);
            Route::get('/destroy/{id}', ['as' => 'admin.cadastros.categoria.destroy', 'uses' => 'CategoriaController@destroy']);
        });

        Route::group(['prefix' => '/produto'], function() {
            Route::get('/', ['as' => 'admin.cadastros.produto.grid', 'uses' => 'ProdutoController@grid']);
            Route::get('/create', ['as' => 'admin.cadastros.produto.create', 'uses' => 'ProdutoController@create']);
            Route::post('/store', ['as' => 'admin.cadastros.produto.store', 'uses' => 'ProdutoController@store']);
            Route::get('/edit/{id}', ['as' => 'admin.cadastros.produto.edit', 'uses' => 'ProdutoController@edit']);
            Route::put('/update/{id}', ['as' => 'admin.cadastros.produto.update', 'uses' => 'ProdutoController@update']);
            Route::get('/destroy/{id}', ['as' => 'admin.cadastros.produto.destroy', 'uses' => 'ProdutoController@destroy']);

            Route::group(['prefix' => '/imagens'], function() {
                Route::get('/{id}', ['as' => 'admin.cadastros.produto.imagens', 'uses' => 'ProdutoController@imagens']);
                Route::get('/create/{id}', ['as' => 'admin.cadastros.produto.imagens.create', 'uses' => 'ProdutoController@createImagem']);
                Route::post('/store/{id}', ['as' => 'admin.cadastros.produto.imagens.store', 'uses' => 'ProdutoController@storeImagem']);
                Route::get('/destroy/{id}', ['as' => 'admin.cadastros.produto.imagens.destroy', 'uses' => 'ProdutoController@destroyImagem']);
            });
        });

    });

    Route::group(['prefix' => '/relatorios'], function() {
        Route::get('/contatos', ['as' => 'admin.relatorios.contatos.index', 'uses' => 'RelatorioController@indexRelatorioContato']);
        Route::post('/contatos', ['as' => 'admin.relatorio.contatos.form', 'uses' => 'RelatorioController@relatorioContatos']);
    });
});

Route::group(['prefix' => '/'], function() {
    Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);

    Route::group(['prefix' => '/contato'], function() {
        Route::get('/', ['as' => 'contato.index', 'uses' => 'ContatoController@index']);
        Route::post('/store', ['as' => 'contato.store', 'uses' => 'ContatoController@store']);
        Route::get('/obrigado', ['as' => 'contato.obrigado', 'uses' => 'ContatoController@obrigado']);
    });

    Route::get('/sobre', ['as' => 'home.sobre.index', 'uses' => 'SobreController@index']);

    Route::get('/noticias', ['as' => 'home.noticias.index', 'uses' => 'NoticiaController@index']);
    Route::get('/noticia/{noticia_id}', ['as' => 'home.noticia', 'uses' => 'NoticiaController@showNoticia']);
});

Route::auth();

Route::get('/home', 'HomeController@index');
