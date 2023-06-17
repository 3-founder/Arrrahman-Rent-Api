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
        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kutipan_sewa', 50);
            $table->string('nama_customer', 50);
            $table->string('email', 100);
            $table->string('nama_perusahaan', 100);
            $table->string('kota', 50);
            $table->string('nama_jalan', 150);
            $table->string('kode_pos', 5);
            $table->string('no_hp', 12);
            $table->date('tanggal');
            $table->string('no_quotation', 9);
            $table->string('komentar', 100);
            $table->string('total_harga', 12);
            $table->bigInteger('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_customer');
    }
};