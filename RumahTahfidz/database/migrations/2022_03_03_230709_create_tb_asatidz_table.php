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
            $table->id();
            $table->string("nomor_induk", 100)->nullable();
            $table->string("no_ktp", 20)->nullable();
            $table->string("pendidikan_terakhir", 100)->nullable();
            $table->string("aktivitas_utama", 100)->nullable();
            $table->text("motivasi_mengajar")->nullable();
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
