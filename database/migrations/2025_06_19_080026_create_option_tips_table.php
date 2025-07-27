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
        Schema::create('option_tips', function (Blueprint $table) {
            $table->id();
            $table->foreign('option_id')->references('id')->on('que_options')->onDelete('cascade');
            $table->text('text_of_tip');
            $table->enum('type',['warning','suggestion','appreciation']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_tips');
    }
};
