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
        Route::get('users/{id}/privilege', 'UserController@privilege')->name('users.privilege');
        Route::resource('users', 'UserController');

        Route::resource('menu', 'MenuController');
        Route::resource('blok', 'BlokController');
        Route::resource('berita', 'BeritaController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('opd', 'OpdController');
        Route::resource('jabatan-opd', 'JabatanOpdController');
        Route::resource('bidang', 'BidangController');
        Route::resource('subbidang', 'SubbidangController');
        Route::resource('rencana-strategi', 'RencanaStrategiController');
        Route::resource('pejabat-opd', 'PejabatOpdController');
        Route::resource('pejabat-bidang', 'PejabatBidangController');
        Route::resource('pejabat-subbidang', 'PejabatSubbidangController');
    });

    Route::group(['prefix' => '/input'], function() {
        Route::resource('rpjmd', 'RpjmdController');

        Route::post('/cariRenstra', 'RenstraController@cari');
        Route::get('/cetakPreviewRenstra', 'RenstraController@cetakPreview');
        Route::get('/cetakRenstra', 'RenstraController@cetak');
        Route::get('/getDataRenstra', 'RenstraController@getDataRenstra');
        Route::post('/hapusRenstra', 'RenstraController@hapus');
        Route::get('/tambahSasaranRenstra', 'RenstraController@tambahSasaran');
        Route::post('/masukkanSasaranRenstra', 'RenstraController@masukkanSasaran');
        Route::get('/tambahIndikatorRenstra', 'RenstraController@tambahIndikator');
        Route::post('/masukkanIndikatorRenstra', 'RenstraController@masukkanIndikator');
        Route::resource('renstra', 'RenstraController');

        Route::post('/cariIku', 'IkuController@cari');
        Route::get('/getDataIku', 'IkuController@getDataIku');
        Route::post('/hapusIku', 'IkuController@hapus');
        Route::get('/tambahSasaranIku', 'IkuController@tambahSasaran');
        Route::post('/masukkanSasaranIku', 'IkuController@masukkanSasaran');
        Route::get('/tambahIndikatorIku', 'IkuController@tambahIndikator');
        Route::post('/masukkanIndikatorIku', 'IkuController@masukkanIndikator');
        Route::resource('iku', 'IkuController');

        Route::post('/cariPerjanjianKinerja', 'PerjanjianKinerjaController@cari');
        Route::get('/getDataPerjanjianKinerja', 'PerjanjianKinerjaController@getDataPerjanjianKinerja');
        Route::post('/hapusPerjanjianKinerja', 'PerjanjianKinerjaController@hapus');
        Route::get('/tambahIndikatorPerjanjianKinerja', 'PerjanjianKinerjaController@tambahIndikator');
        Route::post('/masukkanIndikatorPerjanjianKinerja', 'PerjanjianKinerjaController@masukkanIndikator');
        Route::resource('perjanjianKinerja', 'PerjanjianKinerjaController');

        Route::post('/cariPk3', 'Pk3Controller@cari');
        Route::get('/getDataPk3', 'Pk3Controller@getDataPk3');
        Route::post('/hapusPk3', 'Pk3Controller@hapus');
        Route::get('/tambahIndikatorPk3', 'Pk3Controller@tambahIndikator');
        Route::post('/masukkanIndikatorPk3', 'Pk3Controller@masukkanIndikator');
        Route::resource('pk3', 'Pk3Controller');
    });
});





// Route::get('/home', 'ClientHomeController@index')->name('clientHome');
