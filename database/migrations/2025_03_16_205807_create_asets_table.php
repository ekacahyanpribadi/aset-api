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
        Schema::create('asets', function (Blueprint $table) {
            $table->string('aset_id');
            $table->string('aset_kode');
            $table->string('aset');
            $table->string('aset_katagori_id');
            $table->string('aset_merk_id');
            $table->string('aset_tipe_id');
            $table->string('aset_produsen_id');
            $table->string('aset_no_seri');
            $table->string('aset_tahun_produksi');
            $table->string('aset_deskripsi');
            $table->dateTime('aset_tanggal_pembelian');
            $table->string('aset_todis_id');
            $table->string('aset_no_invoice');
            $table->integer('aset_jumlah');
            $table->decimal('aset_harga_satuan', 19, 2)->default(0);
            $table->decimal('aset_harga_total', 19, 2)->default(0);
            $table->text('aset_file_foto');
            $table->text('aset_file_lampiran');
            $table->text('aset_file_path');
            $table->string('aset_keterangan_tambahan');
            $table->integer('aset_tahun_penyusutan');
            $table->integer('aset_penyusutan_perbulan');
            $table->string('aset_status');
            $table->string('aset_ins_user')->nullable();
            $table->dateTime('aset_ins_date')->nullable();
            $table->string('aset_upd_user')->nullable();
            $table->dateTime('aset_upd_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asets');
    }
};
