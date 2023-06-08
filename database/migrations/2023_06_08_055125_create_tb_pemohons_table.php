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
            $table->integer('km_awal');
            $table->string('tujuan');
            $table->integer('estimasi_bbm');
            $table->integer('estimasi_parkir');
            $table->integer('estimasi_tol');
            $table->integer('estimasi_lain_lain');
            $table->integer('total_estimasi');
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
