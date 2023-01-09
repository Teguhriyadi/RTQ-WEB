<?php

use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Autentikasi\LoginController as AutentikasiLoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\GenerateAsatidzController;
use App\Http\Controllers\GenerateIuranController;
use App\Http\Controllers\HafalanAsatidzController;
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\IuranController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriPelajaranController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LastLoginController;
use App\Http\Controllers\NilaiKategoriController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfilSantriController;
use App\Http\Controllers\ProfilWebController;
use App\Http\Controllers\RekapAbsensiSantriController;
use App\Http\Controllers\RekapIuranController;
use App\Http\Controllers\RekapNilaiController;
use App\Http\Controllers\RekapPenilaianController;
use App\Http\Controllers\Setting\SettingLaporanNilaiController;
use App\Http\Controllers\SettingIuranController;
use App\Http\Controllers\StatusValidasiController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\ValidasiIuranController;
use Illuminate\Support\Facades\Route;

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

Route::get("/app/sistem/ambil_data", [CobaController::class, "json"]);
Route::get("/coba_rekap", [CobaController::class, "coba_rekap"]);
Route::put("/coba_rekap", [CobaController::class, "post_rekap"]);

Route::get("/", [LandingPageController::class, "home"]);
Route::get("/home", [LandingPageController::class, "home"]);
Route::get("/{slug}", [LandingPageController::class, "detailBlog"]);
Route::get("/kontak", [LandingPageController::class, "kontak"]);
Route::post("/pesan", [LandingPageController::class, "pesan"]);

Route::prefix("app")->group(function () {

    Route::get("/theme", function () {
        return view("app.layouts.template");
    });

    require __DIR__ . '/autentikasi/autentikasi.php';

    Route::prefix("sistem")->group(function () {
        Route::group(["middleware" => "autentikasi"], function () {

            // Data Pengajar
            require __DIR__ . '/admin_cabang/akun/asatidz.php';

            // Data Siswa
            require __DIR__ . '/public/master/santri.php';

            // Data Wali Santri
            require __DIR__ . '/admin_cabang/akun/wali_santri.php';

            Route::prefix("laporan")->group(function () {
                Route::prefix("/absensi")->group(function () {
                    // Santri
                    Route::get("/santri", [LaporanController::class, "laporan_absensi_santri"]);
                    Route::put("/santri", [LaporanController::class, "filter_laporan_santri"]);
                    // Asatidz
                    Route::get("/asatidz", [LaporanController::class, "laporan_absensi_asatidz"]);
                    Route::put("/asatidz", [LaporanController::class, "filter_laporan_asatidz"]);
                    Route::get("/asatidz/{id}", [LaporanController::class, "detail_laporan_absensi_asatidz"]);
                });
            });

            Route::group(["middleware" => ["can:super_admin"]], function () {

                // Data Pengaturan
                Route::prefix("pengaturan")->group(function () {
                    Route::get("/", [PengaturanController::class, "pengaturan"]);

                    Route::resource("setting_laporan_nilai", SettingLaporanNilaiController::class);
                });

                // Data Kelas Halaqah
                require __DIR__ . '/super_admin/master/kelas_halaqah.php';

                // Data Role
                Route::get("/role/edit", [RoleController::class, "edit"]);
                Route::put("/role/simpan", [RoleController::class, "update"]);
                Route::resource("/role", RoleController::class);

                // Data Jabatan
                require __DIR__ . '/public/master/jabatan.php';

                // Data Kategori
                Route::get("/kategori/edit", [KategoriController::class, "edit"]);
                Route::put("/kategori/simpan", [KategoriController::class, "update"]);
                Route::resource("/kategori", KategoriController::class);

                // Data Blog
                Route::get("/blog/edit", [BlogController::class, "edit"]);
                Route::put("/blog/simpan", [BlogController::class, "update"]);
                Route::resource("/blog", BlogController::class);

                // Data Admin Cabang
                require __DIR__ . '/super_admin/akun/admin_cabang.php';

                // Hak Akses Users
                Route::get("/users/hak_akses/{id}", [HakAksesController::class, "index"]);
                Route::post("/users/hak_akses/update", [HakAksesController::class, "store"]);
                Route::get("/users/hak_akses/{id}/table", [HakAksesController::class, "table"]);

                // Data Users
                require __DIR__ . '/super_admin/akun/users.php';

                Route::prefix("generate")->group(function () {

                    // Iuran
                    Route::put("/iuran", [GenerateIuranController::class, "show"]);
                    Route::resource("/iuran", GenerateIuranController::class);

                    // Asatidz
                    Route::put("/asatidz", [GenerateAsatidzController::class, "show"]);
                    Route::resource("/asatidz", GenerateAsatidzController::class,  [
                        'as' => 'asatidz2'
                    ]);
                });

                // Data Profil Web
                Route::resource("/profil/web", ProfilWebController::class);

                Route::get("/pesan", [PesanController::class, "index"]);

                // Tentang Kami
                Route::resource("/tentang_kami", TentangKamiController::class);

                // Data Struktur Organisasi
                Route::get("/struktur_organisasi/edit", [StrukturOrganisasiController::class, "edit"]);
                Route::put("/struktur_organisasi/simpan", [StrukturOrganisasiController::class, "update"]);
                Route::resource("/struktur_organisasi", StrukturOrganisasiController::class);

                // Data Hafalan Asatidz
                Route::put("/hafalan/asatidz", [HafalanAsatidzController::class, "filter_tanggal"]);
                Route::resource("/hafalan/asatidz", HafalanAsatidzController::class, [
                    'as' => "hafalan.asatidz"
                ]);
            });

            Route::group(["middleware" => ["can:admin"]], function () {

                // Tes Santri
                require __DIR__ . '/admin_cabang/tes/tes_santri.php';

                // Jenjang Santri
                require __DIR__ . '/admin_cabang/jenjang/jenjang_santri.php';

                // Data Administrasi
                Route::prefix("administrasi")->group(function () {

                    // Lunas
                    Route::get("/lunas", [AdministrasiController::class, "lunas"]);

                    // Belum Lunas
                    Route::get("/belum_lunas/edit", [AdministrasiController::class, "edit_belum_lunas"]);
                    Route::post("/belum_lunas/tambah", [AdministrasiController::class, "tambah_belum_lunas"]);
                    Route::get("/belum_lunas", [AdministrasiController::class, "belum_lunas"]);
                    // Lunas

                });

                Route::prefix("validasi")->group(function () {
                    Route::prefix("iuran")->group(function () {
                        // Belum Lunas
                        Route::get("/belum_lunas", [ValidasiIuranController::class, "v_belum_lunas"]);
                        Route::put("/belum_lunas", [ValidasiIuranController::class, "v_rekap_belum_lunas_by"]);
                        Route::post("/belum_lunas", [ValidasiIuranController::class, "v_cari_rekap_belum_lunas"]);
                        // Lunas
                        Route::get("/lunas", [ValidasiIuranController::class, "v_lunas"]);
                    });
                });
            });

            // Data Besaran Iuran
            require __DIR__ . '/public/master/besaran_iuran.php';

            // Data Kelas
            require __DIR__ . '/public/master/kelas.php';

            // Data Status Absen
            require __DIR__ . '/public/master/status_absen.php';

            // Data Cabang
            require __DIR__ . '/public/master/lokasi_cabang.php';

            // Iuran Wali Santri
            require __DIR__ . '/public/administrasi/iuran.php';

            // Data Halaqah
            require __DIR__ . '/public/master/halaqah.php';

            // Data Jenjang
            require __DIR__ . '/public/master/jenjang.php';

            Route::prefix("/setting")->group(function () {

                Route::prefix("/kategori")->group(function () {

                    // Kategori Pelajaran
                    require __DIR__ . '/public/setting/kategori/pelajaran.php';

                    require __DIR__ . '/public/setting/kategori/nilai.php';
                });

                // Data Nilai Kategori
                Route::get("/nilai/kategori/edit", [NilaiKategoriController::class, "edit"]);
                Route::put("/nilai/kategori/simpan", [NilaiKategoriController::class, "update"]);
                Route::resource("nilai/kategori", NilaiKategoriController::class, [
                    'as' => "nilai.kategori"
                ]);

                // Data Nominal Iuran
                require __DIR__ . '/public/master/nominal_iuran.php';

                // Iuran
                Route::prefix("/iuran")->group(function () {
                    Route::put("/{id}", [SettingIuranController::class, "update"]);
                    Route::resource("/", SettingIuranController::class, [
                        'as' => "iuran.setting"
                    ]);
                });

                // Status Validasi
                require __DIR__ . '/public/pengaturan/status_validasi.php';

                // Kategori Pelajaran
                Route::prefix("/kategori")->group(function () {
                    Route::resource("/penilaian", KategoriPelajaranController::class);
                });
            });

            // Data Pelajaran
            require __DIR__ . '/public/master/pelajaran.php';

            Route::get("/home", [AppController::class, "home"]);

            Route::get("/", [AppController::class, "home"]);

            Route::get("/informasi_login", [LastLoginController::class, "index"]);

            // Data Profil User
            require __DIR__ . '/public/profil/profil_saya.php';

            // Data Profil Santri
            Route::resource('profil_santri', ProfilSantriController::class);

            // Data Rekap Absensi
            Route::get('/rekap_absensi', [RekapAbsensiSantriController::class, 'index']);
            Route::get('/rekap_absensi/{id}', [RekapAbsensiSantriController::class, 'detail']);

            // Data Rekap Penilaian
            Route::get('/rekap_penilaian/{slug}', [RekapPenilaianController::class, 'index']);
            Route::get('/rekap_penilaian/{slug}/{id}', [RekapPenilaianController::class, 'detail']);
            Route::get('/rekap_penilaian/{slug}/{id}/{id_jenjang}', [RekapPenilaianController::class, 'detail']);

            // Data Rekap Nilai
            Route::get("/rekap_nilai", [RekapNilaiController::class, "index"]);
            Route::get("/rekap_nilai/{id_santri}", [RekapNilaiController::class, "detail"]);
            Route::put("/rekap_nilai/{id_santri}", [RekapNilaiController::class, "detail_nilai"]);
            // Data Rekap Iuran
            Route::get('/rekap_iuran', [RekapIuranController::class, 'index']);
            Route::get('/rekap_iuran/{id}', [RekapIuranController::class, 'detail']);
            Route::get('/rekap_iuran/datatables/{id}', [RekapIuranController::class, 'datatable']);
        });
    });

    Route::group(["middleware" => "autentikasi"], function () {
        Route::get("/logout", [AutentikasiLoginController::class, "logout"]);
    });
});
