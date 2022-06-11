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
        Schema::create('tb_kelas_halaqah', function (Blueprint $table) {
            $table->id();
            $table->integer("id_asatidz");
            $table->string("kode_halaqah");
            $table->string("kelas_halaqah");
            $table->string("status")->enum("1", "0")->default(0);
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
        Schema::dropIfExists('tb_kelas_halaqah');
    }
};
