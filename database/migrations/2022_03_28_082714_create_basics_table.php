<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basics', function (Blueprint $table) {
            $table->id();
            $table->string('basic_title',50)->nullable();
            $table->string('basic_subtitle',50)->nullable();
            $table->text('basic_details')->nullable();
            $table->string('basic_pic',50)->nullable();
            $table->string('basic_logo',50)->nullable();
            $table->string('basic_favicon',50)->nullable();
            $table->string('basic_slug',50)->nullable();
            $table->integer('basic_status')->default(1);
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
        Schema::dropIfExists('basics');
    }
}
