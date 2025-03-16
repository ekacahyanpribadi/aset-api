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
        Schema::create('toko_distributors', function (Blueprint $table) {
            $table->string('todis_id');
            $table->string('todis');
            $table->string('todis_alamat');
            $table->string('todis_notelepon');
            $table->string('todis_pic');
            $table->string('todis_pic_notelepon');
            $table->string('todis_status');
            $table->string('todis_ins_user')->nullable();
            $table->dateTime('todis_ins_date')->nullable();
            $table->string('todis_upd_user')->nullable();
            $table->dateTime('todis_upd_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toko_distributors');
    }
};
