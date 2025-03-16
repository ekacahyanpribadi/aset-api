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
        Schema::create('merks', function (Blueprint $table) {
            $table->string('merk_id');
            $table->string('merk');
            $table->string('merk_status');
            $table->string('merk_ins_user')->nullable();
            $table->dateTime('merk_ins_date')->nullable();
            $table->string('merk_upd_user')->nullable();
            $table->dateTime('merk_upd_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merks');
    }
};
