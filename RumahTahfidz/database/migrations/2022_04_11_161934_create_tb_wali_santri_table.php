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
        Schema::create('tb_wali_santri', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("no_ktp", 50);
            $table->string("no_kk", 50);
            $table->string("kode_halaqah");
            $table->string("pekerjaan");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_wali_santri');
    }
};
