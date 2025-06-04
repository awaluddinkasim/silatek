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
        Schema::create('surat_seminar', function (Blueprint $table) {
            $table->id();
            $table->string('layanan');

            // field surat keputusan
            $table->foreignId('pengajuan_id')->constrained('pengajuan')->cascadeOnDelete();
            $table->string('nomor_sk');
            $table->text('ketua_sekertaris');
            $table->text('pembimbing');
            $table->text('penguji');
            $table->string('judul_skripsi');
            $table->enum('kategori', ['skripsi', 'non-skripsi'])->default('skripsi');

            // field surat undangan
            $table->string('nomor_undangan');
            $table->date('tanggal_ujian');
            $table->text('waktu');
            $table->text('tempat');

            $table->text('tanggal_surat');

            $table->enum('penandatangan', ['dekan', 'wakil_dekan'])->default('dekan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_seminar');
    }
};
