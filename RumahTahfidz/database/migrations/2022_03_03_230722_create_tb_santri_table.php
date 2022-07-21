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
            $table->id("id");
            $table->string("nis", 50);
            $table->string("nama_lengkap", 100);
            $table->string("nama_panggilan", 50);
            $table->string("tempat_lahir", 50);
            $table->date("tanggal_lahir");
            $table->enum("jenis_kelamin", ["L", "P"]);
            $table->text("alamat");
            $table->string("prestasi_anak", 100)->nullable();
            $table->string("sekolah", 50);
            $table->integer("id_kelas")->nullable();
            $table->string("kode_halaqah", 50);
            $table->integer("id_wali");
            $table->integer("id_jenjang")->nullable();
            $table->integer("status")->default(0);
            $table->string("foto")->nullable();
            $table->integer("id_nominal_iuran")->nullable();
            $table->integer("id_besaran")->nullable();
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
