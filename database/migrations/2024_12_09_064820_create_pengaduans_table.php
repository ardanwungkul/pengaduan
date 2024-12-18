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

            $table->boolean('respon_1_status')->nullable();
            $table->dateTime('respon_1_tanggal')->nullable();
            $table->text('respon_1_keterangan')->nullable();
            $table->unsignedBigInteger('respon_1_user_id')->nullable();
            $table->foreign('respon_1_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');

            $table->boolean('respon_2_status')->nullable();
            $table->dateTime('respon_2_tanggal')->nullable();
            $table->text('respon_2_keterangan')->nullable();
            $table->unsignedBigInteger('respon_2_user_id')->nullable();
            $table->foreign('respon_2_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');

            $table->boolean('respon_3_status')->nullable();
            $table->dateTime('respon_3_tanggal')->nullable();
            $table->text('respon_3_keterangan')->nullable();
            $table->unsignedBigInteger('respon_3_user_id')->nullable();
            $table->foreign('respon_3_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->string('respon_3_lampiran')->nullable();

            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->foreign('kategori_id')->references('id')->on('kategori_pelapors')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('subjek_id')->nullable();
            $table->foreign('subjek_id')->references('id')->on('subjek_laporans')->onUpdate('cascade')->onDelete('set null');
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
