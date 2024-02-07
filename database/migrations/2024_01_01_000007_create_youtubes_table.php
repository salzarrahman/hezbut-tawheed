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
        Schema::create('youtubes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->string('channelId')->nullable();
            $table->string('video_id')->nullable();
            $table->string('channel_iamge')->nullable();
            $table->string('video_link')->nullable();
            $table->string('title')->nullable();
            $table->string('title_slug')->nullable();
            $table->string('description')->nullable();
            $table->text('tags')->nullable();
            $table->string('thumbnails')->nullable();
            $table->string('channelTitle')->nullable();
            $table->string('publishedAt')->nullable();
            $table->string('status')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('view_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('youtubes');
    }
};
