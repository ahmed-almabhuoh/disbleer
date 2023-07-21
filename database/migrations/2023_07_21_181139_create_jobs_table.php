<?php

use App\Models\Job;
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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('slug')->unique();
            $table->json('files')->nullable();
            $table->enum('type', Job::TYPES);
            $table->boolean('limited')->default(true);
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->float('started_salary')->unsigned();
            $table->float('end_salary')->unsigned();

            $table->foreignId('supervisor_id')->constrained('supervisors', 'id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
