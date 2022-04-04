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
            $table->integer("id")->primary();
            $table->string("nama_ayah", 100)->nullable();
            $table->string("nama_ibu", 100)->nullable();
            $table->integer("id_cabang");
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
        Schema::dropIfExists('tb_siswa');
    }
};
