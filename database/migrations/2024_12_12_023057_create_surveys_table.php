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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('domisili')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('handphone')->nullable();
            $table->string('email')->nullable();
            $table->string('luas_ruangan')->nullable();
            $table->string('jumlah_ruangan')->nullable();
            $table->string('jenis_ruangan')->nullable();
            $table->string('kebutuhan_ruangan')->nullable();
            $table->string('kebutuhan_rencana')->nullable();
            $table->string('kebutuhan_teknis')->nullable();
            $table->string('proyek_akses')->nullable();
            $table->string('ruangan')->nullable();
            $table->string('pertahankan')->nullable();
            $table->string('diganti')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
