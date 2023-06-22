<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoiceonly', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nomor_invoice', 9);
            $table->date('tanggal_invoice');
            $table->string('tanda_penerima_pembayaran', 50);
            $table->string('keterangan', 50);
            $table->string('periode_pembayaran', 50);
            $table->string('total_pembayaran', 12);
            $table->string('metode_pembayaran', 20);
            $table->string('nama_bank', 20)->nullable();
            $table->string('no_rekening', 25)->nullable();
            $table->string('a_n_rekening', 40)->nullable();
            $table->string('nama_tanda_tangan', 40);
            $table->string('img_tanda_tangan', 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoiceonly');
    }
};