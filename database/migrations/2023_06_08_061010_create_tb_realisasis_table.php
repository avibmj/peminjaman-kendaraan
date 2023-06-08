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
            $table->date('tgl_pengembalian');
            $table->time('jam_pengembalian');
            $table->integer('km_akhir');
            $table->integer('biaya_bbm');
            $table->integer('biaya_parkir');
            $table->integer('biaya_tol');
            $table->integer('biaya_lain_lain');
            $table->integer('total_realisasi');
            $table->text('catatan');
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
