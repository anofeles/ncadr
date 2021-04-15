<?php

use Illuminate\Support\Facades\Route;


Route::get('/backend', 'HomeController@index')->name('admin.home');
Route::get('/backend/{locale}', 'HomeController@index')->name('admin.home.leng');

Route::prefix('backend')->group(function () {

    Route::prefix('menu')->namespace('menu')->group(function () {
        Route::get('/{locale}', 'MenuController@menuindex')->name('admin.menu');
        Route::get('/add/{locale}', 'MenuController@addmenu')->name('admin.menu.add');
        Route::post('/add/{locale}', 'MenuController@addmenu')->name('admin.menu.add');
        Route::get('/edit/{postid}/{locale}', 'MenuController@editmenu')->name('admin.menu.edit');
        Route::post('/edit/{postid}/{locale}', 'MenuController@editmenu')->name('admin.menu.edit');
        Route::get('/delete/{postid}/{locale}', 'MenuController@deletemenu')->name('admin.menu.delete');
    });

    Route::prefix('post')->namespace('post')->group(function () {
        Route::get('/{locale}', 'PostController@postindex')->name('admin.post');
        Route::get('/add/{locale}', 'PostController@addpost')->name('admin.post.add');
        Route::post('/add/{locale}', 'PostController@addpost')->name('admin.post.add');
        Route::get('/edit/{postid}/{locale}', 'PostController@editpost')->name('admin.post.edit');
        Route::post('/edit/{postid}/{locale}', 'PostController@editpost')->name('admin.post.edit');
        Route::get('/delete/{postid}/{locale}', 'PostController@deletepost')->name('admin.post.delete');
    });

    Route::prefix('news')->namespace('news')->group(function () {
        Route::get('/{locale}', 'NewsController@postindex')->name('admin.news');
        Route::get('/add/{locale}', 'NewsController@addpost')->name('admin.news.add');
        Route::post('/add/{locale}', 'NewsController@addpost')->name('admin.news.add');
        Route::get('/edit/{postid}/{locale}', 'NewsController@editpost')->name('admin.news.edit');
        Route::post('/edit/{postid}/{locale}', 'NewsController@editpost')->name('admin.news.edit');
        Route::get('/delete/{postid}/{locale}', 'NewsController@deletepost')->name('admin.news.delete');
    });

    Route::prefix('kodex')->namespace('kodex')->group(function () {
        Route::get('/{locale}', 'KodexController@postindex')->name('admin.kodex');
        Route::get('/add/{locale}', 'KodexController@addpost')->name('admin.kodex.add');
        Route::post('/add/{locale}', 'KodexController@addpost')->name('admin.kodex.add');
        Route::get('/edit/{postid}/{locale}', 'KodexController@editpost')->name('admin.kodex.edit');
        Route::post('/edit/{postid}/{locale}', 'KodexController@editpost')->name('admin.kodex.edit');
        Route::get('/delete/{postid}/{locale}', 'KodexController@deletepost')->name('admin.kodex.delete');
    });

    Route::prefix('them')->namespace('them')->group(function () {
        Route::get('/{locale}', 'ThemController@postindex')->name('admin.them');
        Route::get('/add/{locale}', 'ThemController@addpost')->name('admin.them.add');
        Route::post('/add/{locale}', 'ThemController@addpost')->name('admin.them.add');
        Route::get('/edit/{postid}/{locale}', 'ThemController@editpost')->name('admin.them.edit');
        Route::post('/edit/{postid}/{locale}', 'ThemController@editpost')->name('admin.them.edit');
        Route::get('/delete/{postid}/{locale}', 'ThemController@deletepost')->name('admin.them.delete');
    });

    Route::prefix('blog')->namespace('blog')->group(function () {
        Route::get('/{locale}', 'BlogController@postindex')->name('admin.blog');
        Route::get('/add/{locale}', 'BlogController@addpost')->name('admin.blog.add');
        Route::post('/add/{locale}', 'BlogController@addpost')->name('admin.blog.add');
        Route::get('/edit/{postid}/{locale}', 'BlogController@editpost')->name('admin.blog.edit');
        Route::post('/edit/{postid}/{locale}', 'BlogController@editpost')->name('admin.blog.edit');
        Route::get('/delete/{postid}/{locale}', 'BlogController@deletepost')->name('admin.blog.delete');
    });

    Route::prefix('galeri')->namespace('galeri')->group(function () {
        Route::get('/{locale}', 'GaleriController@postindex')->name('admin.galeri');
        Route::get('/add/{locale}', 'GaleriController@addpost')->name('admin.galeri.add');
        Route::post('/add/{locale}', 'GaleriController@addpost')->name('admin.galeri.add');
        Route::get('/edit/{postid}/{locale}', 'GaleriController@editpost')->name('admin.galeri.edit');
        Route::post('/edit/{postid}/{locale}', 'GaleriController@editpost')->name('admin.galeri.edit');
        Route::get('/media/{mediaid}', 'GaleriController@mediaimgremova')->name('admin.galeri.mediaid');
        Route::get('/delete/{postid}/{locale}', 'GaleriController@deletepost')->name('admin.galeri.delete');
    });

    Route::prefix('biblioteka')->namespace('biblioteka')->group(function () {
        Route::get('/{locale}', 'BibliotekaController@index')->name('admin.biblioteka');
        Route::get('/add/{locale}', 'BibliotekaController@addbiblioteka')->name('admin.biblioteka.add');
        Route::post('/add/{locale}', 'BibliotekaController@addbiblioteka')->name('admin.biblioteka.add');
        Route::get('/edit/{postid}/{locale}', 'BibliotekaController@editbook')->name('admin.edit.biblioteka');
        Route::post('/edit/{postid}/{locale}', 'BibliotekaController@editbook')->name('admin.edit.biblioteka');
        Route::get('/delete/{postid}/{locale}', 'BibliotekaController@deletebook')->name('admin.delete.biblioteka');
        Route::prefix('biblioteka_categori')->group(function () {
            Route::get('/categor{locale}', 'BibliotekaController@categorIndex')->name('admin.biblioteka.categorIndex');
            Route::get('/add/{locale}', 'BibliotekaController@addcategor')->name('admin.biblioteka.categorIndex.add');
            Route::post('/add/{locale}', 'BibliotekaController@addcategor')->name('admin.biblioteka.categorIndex.add');
            Route::get('/edit/{postid}/{locale}', 'BibliotekaController@editcategor')->name('admin.edit.biblioteka.categorIndex');
            Route::post('/edit/{postid}/{locale}', 'BibliotekaController@editcategor')->name('admin.edit.biblioteka.categorIndex');
            Route::get('/delete/{postid}/{locale}', 'BibliotekaController@deletecategor')->name('admin.delete.biblioteka.categorIndex');
        });
        Route::prefix('biblioteka_lamguage')->group(function () {
            Route::get('/lamguage{locale}', 'BibliotekaController@lamguageIndex')->name('admin.biblioteka.lamguage');
            Route::get('/add/{locale}', 'BibliotekaController@addlamguage')->name('admin.biblioteka.lamguage.add');
            Route::post('/add/{locale}', 'BibliotekaController@addlamguage')->name('admin.biblioteka.lamguage.add');
            Route::get('/edit/{postid}/{locale}', 'BibliotekaController@editlamguage')->name('admin.edit.biblioteka.lamguage');
            Route::post('/edit/{postid}/{locale}', 'BibliotekaController@editlamguage')->name('admin.edit.biblioteka.lamguage');
            Route::get('/delete/{postid}/{locale}', 'BibliotekaController@deletelamguage')->name('admin.delete.biblioteka.lamguage');
        });
    });
});

Route::namespace('\App\Http\Controllers\frontend\Auth')->group(function () {
    Route::get('logout', 'LoginController@logout')->name('admin.home.logout');
});
