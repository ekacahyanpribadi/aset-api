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
        Schema::create('lokasis', function (Blueprint $table) {
            $table->string('lokasi_id');
            $table->string('lokasi');
            $table->string('lokasi_status');
            $table->string('lokasi_ins_user')->nullable();
            $table->dateTime('lokasi_ins_date')->nullable();
            $table->string('lokasi_upd_user')->nullable();
            $table->dateTime('lokasi_upd_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasis');
    }
};
