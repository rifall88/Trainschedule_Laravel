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
        Schema::create('tabel_tiket', function (Blueprint $table) {
            $table->id('Id_Tiket');  // Secara default ini akan menjadi primary key
            $table->string('Stasiun_Asal', 100);
            $table->string('Stasiun_Tujuan', 100);
            $table->string('Class', 50);
            $table->date('Tanggal_Berangkat');
            $table->integer('Jumlah_PenumpangDewasa');
            $table->integer('Jumlah_PenumpangBayi');
            $table->timestamps();  // Untuk menambah kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
