<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_schedule', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('social_type');
            $table->string('image_url', 500);
            $table->text('post_data')->nullable();
            $table->string('post_date');
            $table->string('post_time');
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
        Schema::dropIfExists('social_schedule');
    }
}
