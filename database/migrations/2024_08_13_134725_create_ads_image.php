<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_image', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('image_name')->nullable();
            $table->string('image_path');
            $table->string('image_title')->nullable();
            $table->boolean('template_or_custom');
            $table->string('social_site')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads_image');
    }
}
