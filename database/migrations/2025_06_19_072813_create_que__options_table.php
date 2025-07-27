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
        Schema::create('que__options', function (Blueprint $table) {
            $table->id();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->text('option_title');
            $table->decimal('value',8,2);
            $table->decimal('weight',8,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('que__options');
    }
};
