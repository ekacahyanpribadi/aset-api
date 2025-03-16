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
        Schema::create('produsens', function (Blueprint $table) {
            $table->string('produsen_id');
            $table->string('produsen');
            $table->string('produsen_status');
            $table->string('produsen_ins_user')->nullable();
            $table->dateTime('produsen_ins_date')->nullable();
            $table->string('produsen_upd_user')->nullable();
            $table->dateTime('produsen_upd_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produsens');
    }
};
