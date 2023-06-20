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
        Schema::create('transportation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_customer');
            $table->date('tanggal_penggunaan');
            $table->string('tujuan', 50);
            $table->string('lama_penggunaan', 30);
            $table->string('tipe_mobil', 100);
            $table->string('jumlah', 3);
            $table->string('harga', 12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_transportation');
    }
};