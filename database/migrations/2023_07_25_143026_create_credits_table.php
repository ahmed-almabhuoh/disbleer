<?php

use App\Models\Credit;
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
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->float('amount');
            $table->float('credits');
            $table->enum('status', Credit::STATUS);

            $table->foreignId('disable_id')->constrained('disables', 'id')->nullOnDelete();
            $table->foreignId('transaction_id')->constrained('transactions', 'id')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credits');
    }
};
