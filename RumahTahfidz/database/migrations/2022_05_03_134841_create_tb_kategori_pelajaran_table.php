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
        Schema::create('tb_kategori_pelajaran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid("id_jenjang");
            $table->uuid("id_pelajaran");
            $table->uuid("id_kategori_penilaian");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kategori_pelajaran_tadribat');
    }
};
