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
        Schema::create('pembayaran_penyewaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penyewaan');
            $table->foreign('id_penyewaan')->references('id')->on('penyewaan')->onDelete('cascade');
            $table->string('bukti_pembayaran');
            $table->string('jaminan_sewa');
            $table->integer('jumlah_pembayaran');
            $table->integer('kembalian_pembayaran');
            $table->integer('biaya_admin');
            $table->integer('kurang_pembayaran');
            $table->integer('total_pembayaran');
            $table->string('metode')->default('transfer');
            $table->string('jenis_transaksi')->default('ambil ditempat');
            $table->string('status_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_penyewaan');
    }
};
