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
        Schema::create('tb_pengajar', function (Blueprint $table) {
            $table->id();
            $table->string("nama", 50);
            $table->enum("jenis_kelamin", ["L", "P"]);
            $table->text("alamat");
            $table->string("telepon", 30);
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
