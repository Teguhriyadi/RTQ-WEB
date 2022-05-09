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
        Schema::create('tb_blog', function (Blueprint $table) {
            $table->id();
            $table->integer("id_kategori");
            $table->integer("id_user");
            $table->string("judul");
            $table->string("slug")->unique();
            $table->string("foto")->nullable();
            $table->text("deskripsi");
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
        Schema::dropIfExists('tb_blog');
    }
};
