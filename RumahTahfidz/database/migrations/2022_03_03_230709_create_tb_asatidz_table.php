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
        Schema::create('tb_asatidz', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("nomor_induk", 100);
            $table->integer("no_ktp");
            $table->string("pendidikan_terakhir", 100);
            $table->string("aktivitas_utama", 100);
            $table->text("motivasi_mengajar");
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
        Schema::dropIfExists('tb_pengajar');
    }
};
