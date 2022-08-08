<?php

use App\Http\Controllers\BuletinIklimController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoHthController;
use App\Http\Controllers\InformasiHujanBulananController;
use App\Http\Controllers\InformasiHujanDasarianController;
use App\Http\Controllers\IndeksPresipitasiTerstandarisasiController;
use App\Http\Controllers\LogoBmkgController;
use App\Http\Controllers\PermintaanDataController;
use App\Http\Controllers\PrakiraanHujanDasarianController;
use App\Http\Controllers\PrakiraanHujanBulananController;
use App\Http\Controllers\PrakiraanMusimController;
use App\Http\Controllers\PotensiBanjirDasarianController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\SliderPetaController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\TugasFungsiController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\VisiMisiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
Route::get('/', [UserPageController::class, 'beranda'])->name('beranda');

Route::prefix('profil')->group(function () {
    Route::get('/sejarah', [UserPageController::class, 'sejarah'])->name('profil-sejarah');
    Route::get('/visimisi', [UserPageController::class, 'visimisi'])->name('profil-visimisi');
    Route::get('/tugasfungsi', [UserPageController::class, 'tugasfungsi'])->name('profil-tugasfungsi');
    Route::get('/strukturorganisasi', [UserPageController::class, 'strukturorganisasi'])->name('profil-strukturorganisasi');
    Route::get('/logobmkg', [UserPageController::class, 'logobmkg'])->name('profil-logobmkg');
});

Route::prefix('iklim')->group(function () {
    Route::get('/informasi-hari-tanpa-hujan', [UserPageController::class, 'informasiHTH'])->name('informasi-hari-tanpa-hujan');
    Route::get('/buletin-iklim', [UserPageController::class, 'buletinI'])->name('buletin-iklim');
    
    Route::get('/informasi-hujan-bulanan', [UserPageController::class, 'informasiHB'])->name('informasi-hujan-bulanan');
    Route::get('/informasi-hujan-dasarian', [UserPageController::class, 'informasiHD'])->name('informasi-hujan-dasarian');
    Route::get('/indeks-presipitasi-terstandarisasi', [UserPageController::class, 'indeksPT'])->name('indeks-presipitasi-terstandarisasi');
    
    Route::get('/prakiraan-hujan-bulanan', [UserPageController::class, 'prakiraanHB'])->name('prakiraan-hujan-bulanan');
    Route::get('/prakiraan-hujan-dasarian', [UserPageController::class, 'prakiraanHD'])->name('prakiraan-hujan-dasarian');
    Route::get('/prakiraan-musim', [UserPageController::class, 'prakiraanM'])->name('prakiraan-musim');
    Route::get('/potensi-banjir-dasarian', [UserPageController::class, 'potensiBD'])->name('potensi-banjir-dasarian');

    // View One Page
    Route::get('/informasi-hari-tanpa-hujan/{slug}', [UserPageController::class, 'viewinfoHTH'])->name('view-infohth');
    Route::get('/buletin-iklim/{slug}', [UserPageController::class, 'viewbuletinI'])->name('view-buletini');

    Route::get('/informasi-hujan-bulanan/{slug}', [UserPageController::class, 'viewinfoHB'])->name('view-infohb');
    Route::get('/informasi-hujan-dasarian/{slug}', [UserPageController::class, 'viewinfoHD'])->name('view-infohd');
    Route::get('/indeks-presipitasi-terstandarisasi/{slug}', [UserPageController::class, 'viewindeksPT'])->name('view-indekspt');  

    Route::get('/prakiraan-hujan-dasarian/{slug}', [UserPageController::class, 'viewpraHD'])->name('view-prahd');
    Route::get('/prakiraan-musim/{slug}', [UserPageController::class, 'viewpraM'])->name('view-pram');
    Route::get('/potensi-banjir-dasarian/{slug}', [UserPageController::class, 'viewptnBD'])->name('view-ptnbd');
});

Auth::routes();

Route::group(['middleware' => ['auth','role:admin'], 'prefix' => 'admin'], function () {
    Route::get('/', [HomeController::class, 'indexAdmin'])->name('admin');
    Route::get('/pengaturan-akun', [HomeController::class, 'pengaturanAkun'])->name('admin.pengaturan.akun');
    Route::put('/pengaturan-akun/{id}', [HomeController::class, 'updateAkun'])->name('admin.pengaturan.akun.update');
    Route::put('/pengaturan-akun/pass/{id}', [HomeController::class, 'updatePass'])->name('admin.pengaturan.pass.update');
    
    // Monitoring Iklim
    Route::get('/infohth', [InfoHthController::class, 'index'])->name('infohth');
    Route::get('/infohth/create', [InfoHthController::class, 'create'])->name('create_infohth');
    Route::post('/infohth/store', [InfoHthController::class, 'store'])->name('store_infohth');
    Route::get('/infohth/edit/{id}', [InfoHthController::class, 'edit'])->name('edit_infohth');
    Route::put('/infohth/update/{id}', [InfoHthController::class, 'update'])->name('update_infohth');
    Route::delete('/infohth/destroy/{id}', [InfoHthController::class, 'destroy'])->name('destroy_infohth');
    Route::resource('/buletin-iklim', BuletinIklimController::class);
    
    // Analisis Iklim
    Route::resource('/informasi-hujan-bulanan', InformasiHujanBulananController::class);
    Route::resource('/informasi-hujan-dasarian', InformasiHujanDasarianController::class);
    Route::get('/indekspt', [IndeksPresipitasiTerstandarisasiController::class, 'index'])->name('indekspt.index');
    Route::get('/indekspt/create', [IndeksPresipitasiTerstandarisasiController::class, 'create'])->name('indekspt.create');
    Route::post('/indekspt/store', [IndeksPresipitasiTerstandarisasiController::class, 'store'])->name('indekspt.store');
    Route::get('/indekspt/edit/{id}', [IndeksPresipitasiTerstandarisasiController::class, 'edit'])->name('indekspt.edit');
    Route::put('/indekspt/update/{id}', [IndeksPresipitasiTerstandarisasiController::class, 'update'])->name('indekspt.update');
    Route::delete('/indekspt/destroy/{id}', [IndeksPresipitasiTerstandarisasiController::class, 'destroy'])->name('indekspt.destroy');

    //Prakiraan Iklim
    Route::resource('/prakiraan-hujan-bulanan', PrakiraanHujanBulananController::class);
    Route::resource('/prakiraan-hujan-dasarian', PrakiraanHujanDasarianController::class);
    Route::resource('/prakiraan-musim', PrakiraanMusimController::class);
    Route::resource('/potensi-banjir-dasarian', PotensiBanjirDasarianController::class);

    // Slider
    Route::get('/sliderpeta', [SliderPetaController::class, 'index'])->name('sliderpeta');
    Route::get('/sliderpeta/edit/{id}', [SliderPetaController::class, 'edit'])->name('sliderpeta.edit');
    Route::put('/sliderpeta/update/{id}', [SliderPetaController::class, 'update'])->name('sliderpeta.update');

    // Profil
    Route::get('/sejarah', [SejarahController::class, 'index'])->name('sejarah');
    Route::put('/sejarah/update/{id}', [SejarahController::class, 'update'])->name('sejarah.update');

    Route::get('/visi-misi', [VisiMisiController::class, 'index'])->name('visimisi');
    Route::put('/visi-misi/update/{id}', [VisiMisiController::class, 'update'])->name('visimisi.update');

    Route::get('/tugas-fungsi', [TugasFungsiController::class, 'index'])->name('tugasfungsi');
    Route::put('/tugas-fungsi/update/{id}', [TugasFungsiController::class, 'update'])->name('tugasfungsi.update');

    Route::get('/struktur-organisasi', [StrukturOrganisasiController::class, 'index'])->name('strukturorganisasi');
    Route::put('/struktur-organisasi/update/{id}', [StrukturOrganisasiController::class, 'update'])->name('strukturorganisasi.update');

    Route::get('/logo-bmkg', [LogoBmkgController::class, 'index'])->name('logobmkg');
    Route::put('/logo-bmkg/update/{id}', [LogoBmkgController::class, 'update'])->name('logobmkg.update');

    Route::get('/permintaan-data', [PermintaanDataController::class, 'index'])->name('admin.permintaan-data');
    Route::get('/permintaan-data/{id}', [PermintaanDataController::class, 'show'])->name('admin.permintaan-data.show');
    Route::put('/permintaan-data/teruskan/{id}', [PermintaanDataController::class, 'teruskan'])->name('admin.permintaan-data.teruskan');
    Route::put('/permintaan-data/tolak/{id}', [PermintaanDataController::class, 'tolak'])->name('admin.permintaan-data.tolak');
    Route::delete('/permintaa-data/destroy/{id}', [PermintaanDataController::class, 'destroy'])->name('admin.permintaan-data.destroy');

    Route::get('permintaan-data/senddata/{id}', [PermintaanDataController::class, 'senddata'])->name('admin.permintaan-data.senddata');
    Route::put('permintaan-data/senddata/{id}', [PermintaanDataController::class, 'sendingdata'])->name('admin.permintaan-data.sendingdata');
});

// Route::get('/emailtest', [PermintaanDataController::class, 'testemail']);

Route::group(['middleware' => ['auth','role:kepalabidang'], 'prefix' => 'kepalabidang'], function () {
    Route::get('/', [HomeController::class, 'indexKepalaBidang'])->name('kepalabidang');
    Route::get('/pengaturan-akun', [HomeController::class, 'pengaturanAkun'])->name('kepalabidang.pengaturan.akun');
    Route::put('/pengaturan-akun/{id}', [HomeController::class, 'updateAkun'])->name('kepalabidang.pengaturan.akun.update');
    Route::put('/pengaturan-akun/pass/{id}', [HomeController::class, 'updatePass'])->name('kepalabidang.pengaturan.pass.update');
    
    Route::get('/permintaan-data', [PermintaanDataController::class, 'index'])->name('kepalabidang.permintaan-data');
    Route::get('/permintaan-data/{id}', [PermintaanDataController::class, 'show'])->name('kepalabidang.permintaan-data.show');
    Route::put('/permintaan-data/verifikasi/{id}', [PermintaanDataController::class, 'verifikasi'])->name('kepalabidang.permintaan-data.verifikasi');
});

Route::group(['middleware' => ['auth','role:user'], 'prefix' => 'user'], function () {
    Route::get('/', [HomeController::class, 'indexUser'])->name('berandauser');
    Route::get('/pengaturan-akun', [HomeController::class, 'pengaturanAkun'])->name('pengaturan.akun');
    Route::put('/pengaturan-akun/{id}', [HomeController::class, 'updateAkun'])->name('pengaturan.akun.update');
    Route::put('/pengaturan-akun/pass/{id}', [HomeController::class, 'updatePass'])->name('pengaturan.pass.update');

    Route::get('/permintaan-data', [PermintaanDataController::class, 'index'])->name('user.permintaan-data');
    Route::get('/permintaan-data/create', [PermintaanDataController::class, 'create'])->name('user.permintaan-data.create');
    Route::post('/permintaan-data/store', [PermintaanDataController::class, 'store'])->name('user.permintaan-data.store');
    Route::get('/permintaan-data/show/{id}', [PermintaanDataController::class, 'show'])->name('user.permintaan-data.show');
    Route::delete('/permintaan-data/destroy/{id}', [PermintaanDataController::class, 'destroy'])->name('user.permintaan-data.destroy');
});