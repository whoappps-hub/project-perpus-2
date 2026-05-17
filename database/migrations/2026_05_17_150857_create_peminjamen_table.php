<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run migrations.
     */

    public function up(): void
    {
        Schema::create('peminjamen', function (Blueprint $table) {

            $table->id();

            $table->string('nama_peminjam');

            $table->string('identitas');

            $table->string('judul_buku');

            $table->date('tanggal_pinjam');

            $table->date('tenggat_kembali');

            $table->enum('status', [

                'Dipinjam',
                'Dikembalikan'

            ]);

            $table->timestamps();

        });
    }

    /**
     * Reverse migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists(
            'peminjamen'
        );
    }
};