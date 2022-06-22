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
                $table->uuid('id')->primary();
                $table->uuid("id_santri");
                $table->uuid("id_status_absen");
                $table->text("keterangan")->nullable();
                $table->uuid("id_asatidz");
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
