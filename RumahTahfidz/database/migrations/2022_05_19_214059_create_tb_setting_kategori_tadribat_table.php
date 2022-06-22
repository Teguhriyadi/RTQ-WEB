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
        Schema::create('tb_setting_kategori_tadribat', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid("id_jenjang");
            $table->uuid("id_pelajaran_tadribat");
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
        Schema::dropIfExists('tb_setting_kategori_tadribat');
    }
};
