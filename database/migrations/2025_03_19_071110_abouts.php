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
        Schema::create('tbl-abouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('subclassification_id')->constrained('tbl-subclassifications')->onDelete('cascade');
            $table->foreignId('city_id')->constrained('tbl-cities')->onDelete('cascade');
            $table->binary('job-types');
            $table->string('min_salary');
            $table->string('max_salary');
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
        Schema::dropIfExists('tbl-abouts');
    }
};
