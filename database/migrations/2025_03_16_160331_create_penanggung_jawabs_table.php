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
        Schema::create('penanggung_jawabs', function (Blueprint $table) {
            $table->string('penja_id');
            $table->string('penja_nama');
            $table->string('penja_no_telepon');
            $table->string('penja_email');
            $table->string('penja_alamat');
            $table->string('penja_jabatan');
            $table->string('penja_instansi');
            $table->string('penja_keterangan');
            $table->string('penja_status');
            $table->string('penja_ins_user')->nullable();
            $table->dateTime('penja_ins_date')->nullable();
            $table->string('penja_upd_user')->nullable();
            $table->dateTime('penja_upd_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penanggung_jawabs');
    }
};
