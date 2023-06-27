<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_realisasis', function (Blueprint $table) {
            $table->id('id_realisasi');
            $table->unsignedBigInteger('id_pemohon')->nullable();
            $table->foreign('id_pemohon')->references('id_pemohon')->on('tb_pemohons')->onDelete('cascade');
            $table->string('realisasi_tujuan');
            $table->date('tgl_pulang');
            $table->time('jam_pulang');
            $table->bigInteger('km_akhir');
            $table->bigInteger('biaya_bbm');
            $table->bigInteger('biaya_parkir');
            $table->bigInteger('biaya_tol');
            $table->bigInteger('biaya_lain_lain');
            $table->bigInteger('total_realisasi');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_realisasis');
    }
};
