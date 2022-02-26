<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('ban_title',50)->nullable();
            $table->string('ban_subtitle',50)->nullable();
            $table->string('ban_description',200)->nullable();
            $table->string('ban_button',50)->nullable();
            $table->string('ban_url',200)->nullable();
            $table->string('ban_image',50)->nullable();
            $table->string('ban_slug',50)->nullable();
            $table->integer('ban_creator')->nullable();
            $table->integer('ban_status')->default(1);
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
        Schema::dropIfExists('banners');
    }
}
