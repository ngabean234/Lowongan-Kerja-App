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
        Schema::create('tbl-jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('tbl-companies')->onDelete('cascade');
            $table->foreignId('city_id')->constrained('tbl-cities')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('tbl-job-types')->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->text('requirement');
            $table->bigInteger('min_salary');
            $table->bigInteger('max_salary');
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
        Schema::dropIfExists('tbl-jobs');
    }
};
