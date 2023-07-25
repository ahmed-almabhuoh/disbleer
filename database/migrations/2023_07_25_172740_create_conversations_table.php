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
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('disable_id')->constrained('disables', 'id')->cascadeOnDelete();
            $table->foreignId('supervisor_id')->constrained('supervisors', 'id')->cascadeOnDelete();
            $table->foreignId('job_id')->constrained('jobs', 'id')->cascadeOnDelete();

            $table->unique([
                'disable_id',
                'supervisor_id',
                'job_id',
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
};
