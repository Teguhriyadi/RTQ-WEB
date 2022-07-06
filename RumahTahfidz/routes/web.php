<?php

use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\AdminLokasiRtController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AsatidzController;
use App\Http\Controllers\BesaranIuranController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GenerateAsatidzController;
use App\Http\Controllers\GenerateIuranController;
use App\Http\Controllers\HafalanAsatidzController;
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\HalaqahController;
use App\Http\Controllers\IuranController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriPelajaranController;
use App\Http\Controllers\KategoriPenilaianController;
use App\Http\Controllers\KelasHalaqahController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LastLoginController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokasiRtController;
use App\Http\Controllers\NilaiKategoriController;
use App\Http\Controllers\NominalIuranController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfilSantriController;
use App\Http\Controllers\ProfilUserController;
use App\Http\Controllers\ProfilWebController;
use App\Http\Controllers\RekapAbsensiSantriController;
use App\Http\Controllers\RekapIuranController;
use App\Http\Controllers\RekapNilaiController;
use App\Http\Controllers\RekapPenilaianController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\SettingIuranController;
use App\Http\Controllers\StatusAbsenController;
use App\Http\Controllers\StatusValidasiController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\TesSantriController;
use App\Http\Controllers\ValidasiIuranController;
use App\Http\Controllers\WaliSantriController;
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

    Route::get("/login", [LoginController::class, "login"])->middleware("guest");
    Route::post("/login", [LoginController::class, "loginProses"]);

    Route::put('/hak_akses', [LoginController::class, "hakAkses"]);
    Route::post('/hak_akses/{id}', [LoginController::class, "changeHakAkses"]);

    Route::get("/forgot-password", [ForgotPasswordController::class, "index"]);
    Route::post("/forgot-password", [ForgotPasswordController::class, "store"]);

    Route::prefix("sistem")->group(function () {
        Route::group(["middleware" => "autentikasi"], function () {

            // Data Pengajar
            Route::get("/asatidz/edit/{id}", [AsatidzController::class, "edit"]);
            Route::put("/asatidz/simpan", [AsatidzController::class, "update"]);
            Route::resource("/asatidz", AsatidzController::class);

            // Data Jenjang Santri
            Route::get("/jenjang_santri", [SantriController::class, "jenjang_santri"]);
            Route::put("/jenjang_santri", [SantriController::class, "jenjang_santri_dua"]);
            // Data Siswa
            Route::get("/santri/edit", [SantriController::class, "edit"]);
            Route::get("/santri/datatables", [SantriController::class, "datatables"]);
            Route::put("/santri/simpan", [SantriController::class, "update"]);
            Route::get("/santri/{id}/sertifikat", [SantriController::class, "sertifikat"]);
            Route::get("/santri/tambah_data_santri", [SantriController::class, "tambah_data_santri"]);
            Route::post("/santri/tambah_santri_by_wali", [SantriController::class, "tambah_santri_by_wali"]);
            Route::get("/santri/export", [ExcelController::class, "exportSantri"]);
            Route::resource("/santri", SantriController::class);
            Route::post("/santri/import", [ExcelController::class, "importSantri"]);

            // Data Wali Santri
            Route::get("/wali_santri/export", [ExcelController::class, "exportWaliSantri"]);
            Route::get("/wali_santri/datatables", [WaliSantriController::class, "datatables"]);
            Route::post("/wali_santri/import", [ExcelController::class, "importWaliSantri"]);
            Route::get("/wali_santri/create/anak/{id}", [SantriController::class, "create"]);
            Route::post("/wali_santri/create/anak/", [SantriController::class, "store"]);
            Route::resource("/wali_santri", WaliSantriController::class);

            // Data Pengajar
            Route::get("/asatidz/edit/{id}", [AsatidzController::class, "edit"]);
            Route::put("/asatidz/simpan", [AsatidzController::class, "update"]);
            Route::resource("/asatidz", AsatidzController::class);

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

                // Data Kelas Halaqah
                Route::get("/kelas_halaqah/edit", [KelasHalaqahController::class, "edit"]);
                Route::put("/kelas_halaqah/simpan", [KelasHalaqahController::class, "update"]);
                Route::resource("/kelas_halaqah", KelasHalaqahController::class);

                // Data Role
                Route::get("/role/edit", [RoleController::class, "edit"]);
                Route::put("/role/simpan", [RoleController::class, "update"]);
                Route::resource("/role", RoleController::class);

                // Data Jabatan
                Route::get("/jabatan/edit", [JabatanController::class, "edit"]);
                Route::put("/jabatan/simpan", [JabatanController::class, "update"]);
                Route::resource("jabatan", JabatanController::class);

                // Data Kategori
                Route::get("/kategori/edit", [KategoriController::class, "edit"]);
                Route::put("/kategori/simpan", [KategoriController::class, "update"]);
                Route::resource("/kategori", KategoriController::class);

                // Data Blog
                Route::get("/blog/edit", [BlogController::class, "edit"]);
                Route::put("/blog/simpan", [BlogController::class, "update"]);
                Route::resource("/blog", BlogController::class);

                // Data Admin Cabang
                Route::resource("/admin_lokasi_rt", AdminLokasiRtController::class);

                // Hak Akses Users
                Route::get("/users/hak_akses/{id}", [HakAksesController::class, "index"]);
                Route::post("/users/hak_akses/update", [HakAksesController::class, "store"]);
                Route::get("/users/hak_akses/{id}/table", [HakAksesController::class, "table"]);

                // Data Users
                Route::post("/users/non_aktifkan/", [UsersController::class, "non_aktifkan"]);
                Route::put("/users/simpan", [UsersController::class, "update"]);
                Route::resource("/users", UsersController::class);

                Route::prefix("generate")->group(function () {

                    // Iuran
                    Route::put("/iuran", [GenerateIuranController::class, "show"]);
                    Route::resource("/iuran", GenerateIuranController::class);

                    // Asatidz
                    Route::put("/asatidz", [GenerateAsatidzController::class, "show"]);
                    Route::resource("/asatidz", GenerateAsatidzController::class);
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
                Route::resource("/hafalan/asatidz", HafalanAsatidzController::class);
            });

            Route::group(["middleware" => ["can:admin"]], function () {

                // Tes Santri
                Route::get("/tes/data", [TesSantriController::class, "index"]);
                Route::put("/tes/data/{id}", [TesSantriController::class, "detail"]);
                Route::get("/tes/input", [TesSantriController::class, "create"]);
                Route::put("/tes/simpan", [TesSantriController::class, "update"]);
                Route::get("/tes/edit", [TesSantriController::class, "edit"]);
                Route::put("/tes/simpan_data", [TesSantriController::class, "simpan"]);

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

                        // Lunas
                        Route::get("/lunas", [ValidasiIuranController::class, "v_lunas"]);
                    });
                });
            });

            // Data Besaran Iuran
            Route::get("/besaran_iuran/edit", [BesaranIuranController::class, "edit"]);
            Route::put("/besaran_iuran/simpan", [BesaranIuranController::class, "update"]);
            Route::resource("/besaran_iuran", BesaranIuranController::class);

            // Data Besaran Iuran Santri
            Route::get("/besaran_santri/edit", [BesaranIuranSantriController::class, "edit"]);
            Route::put("/besaran_santri/simpan", [BesaranIuranSantriController::class, "update"]);
            Route::resource("/besaran_santri", BesaranIuranSantriController::class);

            // Data Kelas
            Route::get("/kelas/edit", [KelasController::class, "edit"]);
            Route::put("/kelas/simpan", [KelasController::class, "update"]);
            Route::resource("/kelas", KelasController::class);

            // Data Status Absen
            Route::get("/status_absen/edit", [StatusAbsenController::class, "edit"]);
            Route::put("/status_absen/simpan", [StatusAbsenController::class, "update"]);
            Route::resource("/status_absen", StatusAbsenController::class);

            // Data Cabang
            Route::get("/lokasi_cabang/edit", [LokasiRtController::class, "edit"]);
            Route::put("/lokasi_cabang/simpan", [LokasiRtController::class, "update"]);
            Route::resource("/lokasi_cabang", LokasiRtController::class);

            // Iuran Wali Santri
            Route::get("/iuran", [IuranController::class, "validasi_admin_cabang"]);
            Route::put("/iuran", [IuranController::class, "simpan_validasi"]);

            // Data Halaqah
            Route::get("/halaqah/edit", [HalaqahController::class, "edit"]);
            Route::put("/halaqah/simpan", [HalaqahController::class, "update"]);
            Route::delete("/halaqah/{kode_halaqah}", [HalaqahController::class, "destroy"]);
            Route::resource("/halaqah", HalaqahController::class);

            // Data Jenjang
            Route::get("/jenjang/edit", [JenjangController::class, "edit"]);
            Route::put("jenjang/simpan", [JenjangController::class, "update"]);
            Route::resource("/jenjang", JenjangController::class);

            Route::prefix("/setting")->group(function () {

                Route::prefix("/kategori")->group(function () {

                    Route::get("/pelajaran/edit", [KategoriPelajaranController::class, "edit"]);
                    Route::put("/pelajaran/simpan", [KategoriPelajaranController::class, "update"]);
                    Route::resource("/pelajaran", KategoriPelajaranController::class);

                    Route::get("/nilai/edit", [KategoriPenilaianController::class, "edit"]);
                    Route::put("/nilai/simpan", [KategoriPenilaianController::class, "update"]);
                    Route::resource("nilai", KategoriPenilaianController::class);
                });

                // Data Nilai Kategori
                Route::get("/nilai/kategori/edit", [NilaiKategoriController::class, "edit"]);
                Route::put("/nilai/kategori/simpan", [NilaiKategoriController::class, "update"]);
                Route::resource("nilai/kategori", NilaiKategoriController::class);

                // Data Nominal Iuran
                Route::prefix("/nominal/iuran")->group(function () {
                    Route::get("/edit", [NominalIuranController::class, "edit"]);
                    Route::put("/simpan", [NominalIuranController::class, "update"]);
                    Route::post("/aktifkan", [NominalIuranController::class, "aktifkan"]);
                    Route::post("/non_aktifkan", [NominalIuranController::class, "non_aktifkan"]);
                    Route::resource("/", NominalIuranController::class);
                });

                // Iuran
                Route::prefix("/iuran")->group(function () {
                    Route::put("/{id}", [SettingIuranController::class, "update"]);
                    Route::resource("/", SettingIuranController::class);
                });

                // Status Validasi
                Route::prefix("/validasi")->group(function () {
                    Route::get("/edit", [StatusValidasiController::class, "edit"]);
                    Route::put("/simpan", [StatusValidasiController::class, "update"]);
                    Route::delete("/{id}", [StatusValidasiController::class, "destroy"]);
                    Route::resource("/", StatusValidasiController::class);
                });

                // Kategori Pelajaran
                Route::prefix("/kategori")->group(function () {
                    Route::resource("/penilaian", KategoriPelajaranController::class);
                });
            });

            // Data Pelajaran
            Route::get("/pelajaran/edit", [PelajaranController::class, "edit"]);
            Route::put("/pelajaran/simpan", [PelajaranController::class, "update"]);
            Route::resource("/pelajaran", PelajaranController::class);

            Route::get("/home", [AppController::class, "home"]);

            Route::get("/", [AppController::class, "home"]);

            Route::get("/informasi_login", [LastLoginController::class, "index"]);

            // Data Profil User
            Route::get("/profil/user", [ProfilUserController::class, "index"]);
            Route::put("/profil/user/simpan_gambar_profil", [ProfilUserController::class, "simpan_gambar_profil"]);
            Route::put("/profil/user/ganti_password", [ProfilUserController::class, "ganti_password"]);

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
        Route::get("/logout", [LoginController::class, "logout"]);
    });
});
