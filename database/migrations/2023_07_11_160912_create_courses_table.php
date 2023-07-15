<?php

use App\Models\Course;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('status', Course::STATUS);
            $table->enum('type', Course::TYPE);
            $table->string('indicate');
            $table->json('pre_courses')->nullable();
            $table->json('tests')->nullable();
            $table->json('images')->nullable();
            $table->double('score')->default(0.0);
            $table->text('description')->nullable();
            $table->text('blog')->nullable();
            $table->text('link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
