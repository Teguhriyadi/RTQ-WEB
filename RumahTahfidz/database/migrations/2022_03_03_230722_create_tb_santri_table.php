<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_santri', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("nis", 50);
            $table->string("nama_lengkap", 100);
            $table->string("nama_panggilan", 50);
            $table->string("tempat_lahir", 50);
            $table->date("tanggal_lahir");
            $table->enum("jenis_kelamin", ["L", "P"]);
            $table->text("alamat");
            $table->string("prestasi_anak", 100);
            $table->string("sekolah", 50);
            $table->uuid("id_kelas");
            $table->string("kode_halaqah", 50);
            $table->uuid("id_wali");
            $table->uuid("id_jenjang")->nullable();
            $table->integer("status")->default(0);
            $table->string("foto")->nullable();
            $table->uuid("id_nominal_iuran")->nullable();
            $table->uuid("id_besaran")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_santri');
    }
};
