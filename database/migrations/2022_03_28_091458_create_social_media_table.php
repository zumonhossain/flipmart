<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->string('sm_facebook',100)->nullable();
            $table->string('sm_twitter',100)->nullable();
            $table->string('sm_linkedin',100)->nullable();
            $table->string('sm_instagram',100)->nullable();
            $table->string('sm_pinterest',100)->nullable();
            $table->string('sm_skype',100)->nullable();
            $table->string('sm_youtube',100)->nullable();
            $table->string('sm_google',100)->nullable();
            $table->string('sm_vimeo',100)->nullable();
            $table->string('sm_whatsapp',100)->nullable();
            $table->string('sm_slug',50)->nullable();
            $table->integer('sm_status')->default(1);
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
        Schema::dropIfExists('social_media');
    }
}
