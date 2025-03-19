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
        Schema::create('tbl-job-types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('archived')->default('N');
            $table->string('create_id')->default('1');
            $table->string('update_id')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl-job-types');
    }
};
