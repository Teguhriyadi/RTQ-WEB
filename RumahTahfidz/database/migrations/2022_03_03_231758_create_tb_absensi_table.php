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
            Schema::create('tb_absensi', function (Blueprint $table) {
                $table->id();
                $table->integer("id_santri");
                $table->integer("id_status_absen");
                $table->text("keterangan")->nullable();
                $table->integer("id_asatidz");
                $table->integer("id_jenjang")->nullable();
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
            Schema::dropIfExists('tb_absensi');
        }
    };
