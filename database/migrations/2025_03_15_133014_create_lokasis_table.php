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
            $table->string('lokasi_ins_user');
            $table->dateTime('lokasi_ins_date');
            $table->string('lokasi_upd_user');
            $table->dateTime('lokasi_upd_date');
            $table->timestamps();
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
