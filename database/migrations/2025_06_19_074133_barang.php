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
    Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->timestamps();
        });
    Schema::create('produks', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
        $table->string('nama_produk');
        $table->string('gambar')->nullable();
        $table->decimal('harga',10,2);
        $table->integer('stok');
        $table->timestamps();
    });
    // Tabel Transaksi
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade');
            $table->enum('jenis', ['masuk', 'keluar']);
            $table->integer('jumlah');
            $table->bigInteger('subtotal_harga')->nullable();
            $table->timestamps();
        });

        //suplier
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier');
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->timestamps();
        });

        Schema::create('product_supplier', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
        Schema::dropIfExists('kategoris');
        Schema::dropIfExists('transaksis');
        Schema::dropIfExists('product_supplier');
        Schema::dropIfExists('suppliers');
    }
};
