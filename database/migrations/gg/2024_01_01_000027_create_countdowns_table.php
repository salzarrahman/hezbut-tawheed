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
        Schema::create('countdowns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_01')->nullable();
            $table->string('title_01_countdowns')->nullable();
            $table->string('title_01_icon')->nullable();
            $table->string('title_02')->nullable();
            $table->string('title_02_countdowns')->nullable();
            $table->string('title_02_icon')->nullable();
            $table->string('title_03')->nullable();
            $table->string('title_03_countdowns')->nullable();
            $table->string('title_03_icon')->nullable();
            $table->string('title_04')->nullable();
            $table->string('title_04_countdowns')->nullable();
            $table->string('title_04_icon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countdowns');
    }
};
