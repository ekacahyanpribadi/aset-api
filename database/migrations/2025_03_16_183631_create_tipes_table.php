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
        Schema::create('tipes', function (Blueprint $table) {
            $table->string('tipe_id');
            $table->string('tipe');
            $table->string('tipe_status');
            $table->string('tipe_ins_user')->nullable();
            $table->dateTime('tipe_ins_date')->nullable();
            $table->string('tipe_upd_user')->nullable();
            $table->dateTime('tipe_upd_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipes');
    }
};
