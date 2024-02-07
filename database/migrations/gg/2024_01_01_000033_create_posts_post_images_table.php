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
        Schema::create('postimages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('blogpost_id');
            $table->string('images')->nullable();
            $table->timestamps();
            $table->foreign('blogpost_id')->references('id')->on('blogposts')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postimages');
    }
};
