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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pendaftaran');
            $table->string('nama');
            $table->string('alamat');
            $table->string('email');
            $table->string('telepon');
            $table->string('ktp');
            $table->longText('kronologi');
            $table->date('tanggal_kejadian');
            $table->string('lokasi_kejadian');
            $table->string('dokumen');
            $table->string('status');
            $table->date('tanggal_status');
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->foreign('kategori_id')->references('id')->on('kategori_pelapors')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('jenis_id')->nullable();
            $table->foreign('jenis_id')->references('id')->on('jenis_pengaduans')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('kategori_instansi_id')->nullable();
            $table->foreign('kategori_instansi_id')->references('id')->on('kategori_instansis')->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
