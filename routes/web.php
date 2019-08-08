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
        Route::post('/rencana-strategi/cari', 'ClientSakipController@rencana_strategi_cari')->name('sakip.rencana_strategi_cari');

        Route::get('/rencana-program', 'ClientSakipController@rencana_program_kegiatan')->name('sakip.rencana_program_kegiatan');
        Route::post('/rencana-program/cari', 'ClientSakipController@rencana_program_kegiatan_cari')->name('sakip.rencana_program_kegiatan.cari');

        Route::get('/indikator-kinerja-utama', 'ClientSakipController@indikator_kinerja_utama')->name('sakip.indikator_kinerja_utama');
        Route::post('/indikator-kinerja-utama/cari', 'ClientSakipController@indikator_kinerja_utama_cari')->name('sakip.indikator_kinerja_utama.cari');

        // Route::get('/perjanjian-kinerja', 'ClientSakipController@perjanjian_kinerja')->name('sakip.perjanjian_kinerja');
        // Route::post('/perjanjian-kinerja/cari', 'ClientSakipController@perjanjian_kinerja_cari')->name('sakip.perjanjian_kinerja.cari');

        Route::get('/perjanjian-kinerja2', 'ClientSakipController@perjanjian_kinerja2')->name('sakip.perjanjian_kinerja2');
        Route::post('/perjanjian-kinerja2/cari', 'ClientSakipController@perjanjian_kinerja2_cari')->name('sakip.perjanjian_kinerja2.cari');

        Route::get('/realisasi-kinerja', 'ClientSakipController@realisasi_kinerja')->name('sakip.realisasi_kinerja');
        Route::post('/realisasi-kinerja/cari', 'ClientSakipController@realisasi_kinerja_cari')->name('sakip.realisasi_kinerja.cari');

        Route::get('/rpjmd', 'ClientSakipController@rpjmd')->name('sakip.rpjmd');
        Route::post('/rpjmd/cari', 'ClientSakipController@rpjmd_cari')->name('sakip.rpjmd.cari');

        Route::get('/lakip', 'ClientSakipController@lakip')->name('sakip.lakip');
        Route::post('/lakip/cari', 'ClientSakipController@lakip_cari')->name('sakip.lakip.cari');

        Route::get('/grafik', 'ClientSakipController@grafik')->name('sakip.grafik');
    });

    Route::get('/tentang-sakip', 'ClientTentangSakipController@index')->name('clientTentangSakip');
    Route::get('/berita', 'ClientBeritaController@index')->name('clientBerita');
    Route::get('/gallery', 'ClientGalleryController@index')->name('clientGallery');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/home/chart', 'HomeController@chart')->name('home.chart');

    Route::get('profile/ubah-password', 'ProfileController@ubah_password')->name('profile.ubah_password');
    Route::put('profile/ubah-password/{id}/store', 'ProfileController@ubah_password_store')->name('profile.ubah_password_store');
    Route::resource('profile', 'ProfileController');

    Route::get('/kriteria/{id}', 'KriteriaController@index')->name('kriteria.index');

    Route::group(['prefix' => '/master'], function() {
        Route::get('users/{id}/privilege', 'UserController@privilege')->name('users.privilege');
        Route::resource('users', 'UserController');

        // Route::resource('menu', 'MenuController');
        // Route::resource('blok', 'BlokController');
        Route::resource('opd', 'OpdController');
        Route::resource('jabatan-opd', 'JabatanOpdController');
        Route::resource('bidang', 'BidangController');
        Route::resource('subbidang', 'SubbidangController');
        Route::resource('rencana-strategi', 'RencanaStrategiController');
        Route::resource('pejabat-opd', 'PejabatOpdController');
        Route::resource('pejabat-bidang', 'PejabatBidangController');
        Route::resource('pejabat-subbidang', 'PejabatSubbidangController');

        Route::get('/tampilSasaran', 'SasaranController@tampil');
        Route::post('/hapusSasaran', 'SasaranController@hapus');
        Route::resource('sasaran', 'SasaranController');
        
        Route::get('/tampilIndikator', 'IndikatorController@tampil');
        Route::post('/hapusIndikator', 'IndikatorController@hapus');
        Route::resource('indikator', 'IndikatorController');

        Route::get('/tampilTarget', 'TargetController@tampil');
        Route::post('/hapusTarget', 'TargetController@hapus');
        Route::resource('target', 'TargetController');
    });

    Route::group(['prefix' => '/input'], function() {
        Route::resource('berita', 'BeritaController');
        Route::resource('gallery', 'GalleryController');
        
        Route::post('/cariRpjmd', 'RpjmdController@cari');
        Route::post('/hapusRpjmd', 'RpjmdController@hapus');
        Route::get('/tambahSasaranRpjmd', 'RpjmdController@tambahSasaran');
        Route::post('/masukkanSasaranRpjmd', 'RpjmdController@masukkanSasaran');
        Route::get('/tambahIndikatorRpjmd', 'RpjmdController@tambahIndikator');
        Route::post('/masukkanIndikatorRpjmd', 'RpjmdController@masukkanIndikator');
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

        // Route::post('/cariIku', 'IkuController@cari');
        // Route::get('/getDataIku', 'IkuController@getDataIku');
        // Route::post('/hapusIku', 'IkuController@hapus');
        // Route::get('/tambahSasaranIku', 'IkuController@tambahSasaran');
        // Route::post('/masukkanSasaranIku', 'IkuController@masukkanSasaran');
        // Route::get('/tambahIndikatorIku', 'IkuController@tambahIndikator');
        // Route::post('/masukkanIndikatorIku', 'IkuController@masukkanIndikator');
        // Route::resource('iku', 'IkuController');

        Route::post('/cariIku2', 'Iku2Controller@cari');
        Route::get('/getDataIku2', 'Iku2Controller@getDataIku2');
        Route::post('/hapusIku2', 'Iku2Controller@hapus');
        Route::get('/tambahSasaranIku2', 'Iku2Controller@tambahSasaran');
        Route::post('/masukkanSasaranIku2', 'Iku2Controller@masukkanSasaran');
        Route::get('/tambahIndikatorIku2', 'Iku2Controller@tambahIndikator');
        Route::post('/masukkanIndikatorIku2', 'Iku2Controller@masukkanIndikator');
        Route::resource('iku2', 'Iku2Controller');

        Route::post('/cariPpk', 'PpkController@cari');
        Route::post('/hapusPpk', 'PpkController@hapus');
        Route::get('/tambahIndikatorPpk', 'PpkController@tambahIndikator');
        Route::post('/masukkanIndikatorPpk', 'PpkController@masukkanIndikator');
        Route::post('/ppk/proses', 'PpkController@proses');
        Route::resource('ppk', 'PpkController');

        Route::post('/cariRealisasiKinerja', 'RealisasiKinerjaController@cari');
        Route::post('/hapusRealisasiKinerja', 'RealisasiKinerjaController@hapus');
        Route::get('/tambahIndikatorRealisasiKinerja', 'RealisasiKinerjaController@tambahIndikator');
        Route::post('/masukkanIndikatorRealisasiKinerja', 'RealisasiKinerjaController@masukkanIndikator');
        Route::post('/RealisasiKinerja/proses', 'RealisasiKinerjaController@proses');
        Route::resource('realisasiKinerja', 'RealisasiKinerjaController');

        Route::post('/cariPerjanjianKinerja', 'PerjanjianKinerjaController@cari');
        Route::get('/getDataPerjanjianKinerja', 'PerjanjianKinerjaController@getDataPerjanjianKinerja');
        Route::post('/hapusPerjanjianKinerja', 'PerjanjianKinerjaController@hapus');
        Route::get('/tambahIndikatorPerjanjianKinerja', 'PerjanjianKinerjaController@tambahIndikator');
        Route::post('/masukkanIndikatorPerjanjianKinerja', 'PerjanjianKinerjaController@masukkanIndikator');
        Route::resource('perjanjianKinerja', 'PerjanjianKinerjaController');


        // Route::post('/cariPerjanjianKinerja2', 'PerjanjianKinerja2Controller@cari');
        // Route::post('/hapusPerjanjianKinerja2', 'PerjanjianKinerja2Controller@hapus');
        // Route::post('/perjanjianKinerja2/proses', 'PerjanjianKinerja2Controller@proses');
        // Route::post('/perjanjianKinerja2/upload', 'PerjanjianKinerja2Controller@proses')->name('PerjanjianKinerja2.upload');
        // Route::resource('perjanjianKinerja2', 'PerjanjianKinerja2Controller');

        Route::post('/cariPk3', 'Pk3Controller@cari');
        Route::get('/getDataPk3', 'Pk3Controller@getDataPk3');
        Route::post('/hapusPk3', 'Pk3Controller@hapus');
        Route::get('/tambahIndikatorPk3', 'Pk3Controller@tambahIndikator');
        Route::post('/masukkanIndikatorPk3', 'Pk3Controller@masukkanIndikator');
        Route::resource('pk3', 'Pk3Controller');

        Route::post('/cariPk4', 'Pk4Controller@cari');
        Route::post('/hapusPk4', 'Pk4Controller@hapus');
        Route::get('/tambahIndikatorPk4', 'Pk4Controller@tambahIndikator');
        Route::post('/masukkanIndikatorPk4', 'Pk4Controller@masukkanIndikator');
        Route::resource('pk4', 'Pk4Controller');

        Route::post('/cariRencanaAnggaran', 'RencanaAnggaranController@cari');
        Route::post('/hapusRencanaAnggaran', 'RencanaAnggaranController@hapus');
        Route::get('/tambahIndikatorRencanaAnggaran', 'RencanaAnggaranController@tambahIndikator');
        Route::post('/masukkanIndikatorRencanaAnggaran', 'RencanaAnggaranController@masukkanIndikator');
        Route::post('/RencanaAnggaran/proses', 'RencanaAnggaranController@proses');
        Route::resource('rencanaAnggaran', 'RencanaAnggaranController');

        Route::post('/cariRealisasiAnggaran', 'RealisasiAnggaranController@cari');
        Route::post('/hapusRealisasiAnggaran', 'RealisasiAnggaranController@hapus');
        Route::get('/tambahIndikatorRealisasiAnggaran', 'RealisasiAnggaranController@tambahIndikator');
        Route::post('/masukkanIndikatorRealisasiAnggaran', 'RealisasiAnggaranController@masukkanIndikator');
        Route::post('/RealisasiAnggaran/proses', 'RealisasiAnggaranController@proses');
        Route::resource('realisasiAnggaran', 'RealisasiAnggaranController');

        Route::post('/cariCapaian', 'CapaianController@cari');
        Route::post('/hapusCapaian', 'CapaianController@hapus');
        // Route::get('/tambahIndikatorCapaian', 'CapaianController@tambahIndikator');
        // Route::post('/masukkanIndikatorCapaian', 'CapaianController@masukkanIndikator');
        // Route::post('/capaian/proses', 'CapaianController@proses');
        Route::resource('capaian', 'CapaianController');

        Route::post('/cariPengukuran', 'PengukuranController@cari');
        Route::get('/pengukuran/detail/{opd_id}/{tahun}', 'PengukuranController@detail');
        Route::resource('pengukuran', 'PengukuranController');

        Route::post('/cariRencanaPpk', 'RencanaPpkController@cari');
        Route::post('/hapusRencanaPpk', 'RencanaPpkController@hapus');
        Route::resource('rencanaPpk', 'RencanaPpkController');

        Route::post('/cariRealisasiPpk', 'RealisasiPpkController@cari');
        Route::post('/hapusRealisasiPpk', 'RealisasiPpkController@hapus');
        Route::resource('realisasiPpk', 'RealisasiPpkController');

        Route::post('/cariRk', 'RkController@cari');
        Route::post('/hapusRk', 'RkController@hapus');
        Route::resource('rk', 'RkController');

        Route::get('/tampilCapaian2', 'Capaian2Controller@tampil');
        Route::post('/hapusCapaian2', 'Capaian2Controller@hapus');
        Route::resource('capaian2', 'Capaian2Controller');
    });

    Route::group(['prefix' => '/dokumen'], function() {
        Route::post('/cariLakip', 'LakipController@cari');
        Route::post('/hapusLakip', 'LakipController@hapus');
        Route::post('/lakip/proses', 'LakipController@proses');
        Route::post('/lakip/upload', 'LakipController@proses')->name('lakip.upload');
        Route::resource('lakip', 'LakipController');

        Route::post('/cariEvaluasi', 'EvaluasiController@cari');
        Route::post('/hapusEvaluasi', 'EvaluasiController@hapus');
        Route::post('/evaluasi/proses', 'EvaluasiController@proses');
        Route::post('/evaluasi/upload', 'EvaluasiController@proses')->name('evaluasi.upload');
        Route::resource('evaluasi', 'EvaluasiController');
    });
});





// Route::get('/home', 'ClientHomeController@index')->name('clientHome');
