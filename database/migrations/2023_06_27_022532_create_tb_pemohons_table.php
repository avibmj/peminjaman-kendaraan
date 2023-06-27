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
        Schema::create('tb_pemohons', function (Blueprint $table) {
            $table->id('id_pemohon');
            $table->string('nama_pemohon');
            $table->string('jabatan');
            $table->string('bagian');
            $table->string('nama_driver');
            $table->date('tgl_penggunaan');
            $table->date('tgl_pengembalian');
            $table->time('jam_penggunaan');
            $table->time('jam_pengembalian');
            $table->string('jenis');
            $table->string('no_polisi');
            $table->bigInteger('km_awal');
            $table->string('tujuan');
            $table->bigInteger('estimasi_bbm');
            $table->bigInteger('estimasi_parkir');
            $table->bigInteger('estimasi_tol');
            $table->bigInteger('estimasi_lain_lain');
            $table->bigInteger('total_estimasi');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->unsignedBigInteger('id_mobil')->nullable();
            $table->foreign('id_mobil')->references('id_mobil')->on('tb_mobils');
            $table->dropColumn('status_realisasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pemohons');
    }
};
