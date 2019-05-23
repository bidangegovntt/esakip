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
Auth::routes();

Route::get('/', 'ClientHomeController@index')->name('clientHome');

Route::match(["GET", "POST"], "/register", function(){
    return redirect("/login");
})->name("register");

Route::group(['prefix' => '/c'], function() {
    Route::get('/sakip', 'ClientSakipController@index')->name('clientSakip');

    Route::group(['prefix' => '/sakip'], function() {
        Route::get('/rencana-strategi', 'ClientSakipController@rencana_strategi')->name('sakip.rencana_strategi');
        Route::get('/rencana-kinerja-tahunan', 'ClientSakipController@rencana_kinerja_tahunan')->name('sakip.rencana_kinerja_tahunan');
        Route::get('/indikator-kinerja-utama', 'ClientSakipController@indikator_kinerja_utama')->name('sakip.indikator_kinerja_utama');
        Route::get('/perjanjian-kinerja', 'ClientSakipController@perjanjian_kinerja')->name('sakip.perjanjian_kinerja');
        Route::get('/capaian-kinerja', 'ClientSakipController@capaian_kinerja')->name('sakip.capaian_kinerja');
        Route::get('/rpjmd', 'ClientSakipController@rpjmd')->name('sakip.rpjmd');
        Route::get('/lkjlp', 'ClientSakipController@lkjlp')->name('sakip.lkjlp');
        Route::get('/grafik', 'ClientSakipController@grafik')->name('sakip.grafik');
    });

    Route::get('/tentang-sakip', 'ClientTentangSakipController@index')->name('clientTentangSakip');
    Route::get('/berita', 'ClientBeritaController@index')->name('clientBerita');
    Route::get('/gallery', 'ClientGalleryController@index')->name('clientGallery');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => '/master'], function() {
        Route::resource('users', 'UserController');
        Route::resource('berita', 'BeritaController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('opd', 'OpdController');
        Route::resource('jabatan-opd', 'JabatanOpdController');
        Route::resource('bidang', 'BidangController');
        Route::resource('rencana-strategi', 'RencanaStrategiController');
        Route::resource('blok', 'BlokController');
        Route::resource('pejabat-opd', 'PejabatOpdController');
        Route::resource('pejabat-bidang', 'PejabatBidangController');
        Route::resource('pejabat-subbidang', 'PejabatSubbidangController');
    });
});





// Route::get('/home', 'ClientHomeController@index')->name('clientHome');
