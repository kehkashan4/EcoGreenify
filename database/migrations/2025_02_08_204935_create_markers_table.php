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
        Schema::create('markers', function (Blueprint $table) {
            $table->id();
            $table->double('latitude');
            $table->double('longitude');
            $table->string('description',255);
            $table->string('place_name',150);
            $table->string('address',150);
            $table->string('image')->nullable();
            $table->double('circle_radius');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('markers');
    }
};
