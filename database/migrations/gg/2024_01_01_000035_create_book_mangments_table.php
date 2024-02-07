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
        Schema::create('book_mangments', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable();
            $table->string('title')->nullable();
            $table->string('title_slug')->nullable();
            $table->string('authors')->nullable();
            $table->string('publisher_name')->nullable();
            $table->string('publication_year')->nullable();
            $table->string('isbn_number')->nullable();
            $table->string('book_edition')->nullable();
            $table->string('country_origin')->nullable();
            $table->text('description')->nullable();
            $table->string('featured')->nullable();
            $table->string('top_slider')->nullable();
            $table->integer('section')->nullable();
            $table->integer('private')->nullable();
            $table->string('price')->nullable();
            $table->string('categorie_id')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('pdf_file')->nullable();
            $table->integer('status')->default(1);
            $table->integer('view_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_mangments');
    }
};
