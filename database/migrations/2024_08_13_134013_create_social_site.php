<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialSite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_connector', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('type');
            $table->string('social_id');
            $table->string('name')->nullable();
            $table->string('social_email')->nullable();
            $table->string('social_avatar')->nullable();
            $table->string('access_token')->nullable();
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
        Schema::dropIfExists('social_connector');
    }
}
