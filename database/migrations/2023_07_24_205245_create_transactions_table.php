<?php

use App\Models\Transaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('method', Transaction::METHODS);
            $table->string('currency_code')->default('USD');
            $table->float('amount')->nullable();
            $table->float('coins')->nullable();
            $table->text('description')->nullable();
            $table->enum('type', Transaction::TYPE);
            $table->enum('status', Transaction::STATUS);
            $table->json('created_order')->nullable();
            $table->json('dispatched_order')->nullable();
            $table->json('other_payload')->nullable();
            $table->uuid('reference_number')->default(Str::uuid());

            $table->foreignId('disable_id')->constrained('disables', 'id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
