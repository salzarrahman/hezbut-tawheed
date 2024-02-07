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
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_title')->nullable();
            $table->string('tagline')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('col_01')->nullable();
            $table->string('col_02')->nullable();
            $table->string('col_03')->nullable();
            $table->string('col_04')->nullable();
            $table->string('col_05')->nullable();
            $table->string('col_06')->nullable();
            $table->string('col_07')->nullable();
            $table->string('col_08')->nullable();
            $table->string('breadcrumb_bg')->nullable();
            $table->string('campaign_bg')->nullable();
            $table->string('press_tweet_volunteer_left')->nullable();
            $table->string('press_tweet_volunteer_right')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
