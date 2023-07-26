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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->integer('period')->min(1)->unsigned();
            $table->float('salary')->min('25')->unsigned();
            $table->text('proposal');
            $table->float('vat')->unsigned();

            $table->foreignId('disable_id')->constrained('disables', 'id')->cascadeOnDelete();
            $table->foreignId('job_id')->constrained('jobs', 'id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
