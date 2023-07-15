<?php

use App\Models\Test;
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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->text('description')->nullable();
            $table->integer('degree')->default(100)->unsigned();
            $table->integer('attempts')->nullable()->default(1)->unsigned();
            $table->json('pre_tests')->nullable();
            $table->float('passing_score')->default(60.0);
            $table->integer('time_in_minutes')->default(60);
            $table->boolean('sequential')->default(true);
            $table->enum('status', Test::STATUS);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
