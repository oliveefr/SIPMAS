<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('judul');
            $table->text('isi_laporan');
            $table->string('foto')->nullable();
            $table->string('kategori'); // kolom tambahan untuk membedakan bidang/kategori laporan
            $table->enum('status', ['pending', 'proses', 'selesai'])->default('pending'); // default status
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
