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
        Schema::create('user_selections', function (Blueprint $table) {
            $table->id();
            $table->foreign('attempt_id')->references('id')->on('user_attempts')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('option_id')->references('id')->on('que_options')->onDelete('cascade');
            $table->decimal('value',8,2);
            $table->decimal('weight',8,2)->nullable();
            $table->decimal('score',8,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_selections');
    }
};
