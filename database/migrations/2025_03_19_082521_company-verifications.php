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
        Schema::create('tbl-company-verification', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('tbl-companies')->onDelete('cascade');
            $table->string('npwp');
            $table->enum('status', ['Pending', 'Verified'])->default('Verified');
            $table->string('pic_name');
            $table->string('pic_email');
            $table->text('notes')->nullable();
            $table->string('verified_by');
            $table->timestamp('verified_at');
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
        Schema::dropIfExists('tbl-company-verifications');
    }
};
