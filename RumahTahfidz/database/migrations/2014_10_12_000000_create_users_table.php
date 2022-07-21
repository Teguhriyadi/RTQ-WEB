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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("nama", 100);
            $table->string("email", 100)->nullable();
            $table->string("password", 100);
            $table->text("alamat")->nullable();
            $table->string("no_hp", 30)->nullable();
            $table->string("gambar")->nullable();
            $table->string("tempat_lahir");
            $table->date("tanggal_lahir")->nullable();
            $table->string("jenis_kelamin")->enum("L", "P");
            $table->string("token")->nullable();
            $table->integer("id_hak_akses")->nullable();
            $table->integer("status")->default(1);
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
        Schema::dropIfExists('users');
    }
};
