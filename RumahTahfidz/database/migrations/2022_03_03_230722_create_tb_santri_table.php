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
            $table->text("alamat");
            $table->string("prestasi_anak", 100);
            $table->string("sekolah", 50);
            $table->integer("id_kelas");
            $table->string("kode_halaqah", 50);
            $table->integer("id_wali");
            $table->integer("id_jenjang");
            $table->enum("status", ["1", "0"])->default(1);
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
