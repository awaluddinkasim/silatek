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
        Schema::create('surat_seminar_kpi', function (Blueprint $table) {
            $table->id();
            $table->string('layanan');
            $table->foreignId('pengajuan_id')->constrained('pengajuan')->cascadeOnDelete();
            $table->string('nomor');
            $table->text('pembimbing');
            $table->text('penguji');
            $table->text('mahasiswa');
            $table->string('tempat_kpi');
            $table->date('tanggal_ujian');
            $table->text('waktu');
            $table->text('tempat');
            $table->string('tanggal_surat');

            $table->enum('penandatangan', ['dekan', 'wakil_dekan'])->default('dekan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_seminar_kpi');
    }
};
