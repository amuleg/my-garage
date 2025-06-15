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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->string('vin')->nullable();
            $table->text('description')->nullable();
            $table->decimal('purchase_price', 8, 2);
            $table->decimal('sale_price', 8, 2)->nullable();
            $table->date('purchase_date');
            $table->date('sale_date')->nullable();
            $table->enum('status', ['owned', 'sold'])->default('owned');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
