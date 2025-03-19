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
        Schema::create('tbl-cities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained('tbl-provinces')->onDelete('cascade');
            $table->string('name');
            $table->string('archived');
            $table->string('create_id');
            $table->string('update_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl-cities');
    }
};
