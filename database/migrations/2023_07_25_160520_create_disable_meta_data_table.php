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
        Schema::create('disable_meta_data', function (Blueprint $table) {
            $table->id();
            $table->text('about')->nullable();
            $table->string('company')->default('Disbleer');
            $table->string('job')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('address')->nullable();
            $table->foreignId('disable_id')->constrained('disables', 'id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disable_meta_data');
    }
};
