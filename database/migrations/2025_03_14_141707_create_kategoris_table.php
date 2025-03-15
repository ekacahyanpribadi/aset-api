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
            $table->string('kategori_id');
            $table->string('kategori');
            $table->string('kategori_sub');
            $table->string('kategori_keterangan');
            $table->integer('kategori_jumlah_aset');
            $table->string('kategori_status');
            $table->integer('kategori_masa_manfaat');
            $table->integer('kategori_penyusutan_persen_pertahun');
            $table->string('kategori_ins_user');
            $table->dateTime('kategori_ins_date');
            $table->string('kategori_upd_user');
            $table->dateTime('kategori_upd_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoris');
    }
};
