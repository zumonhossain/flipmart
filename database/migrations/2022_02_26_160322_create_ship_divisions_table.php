<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_divisions', function (Blueprint $table) {
            $table->id();
            $table->string('division_name',100)->nullable();
            $table->string('division_slug',100)->nullable();
            $table->integer('division_creator')->nullable();
            $table->integer('division_status')->default(1);
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
        Schema::dropIfExists('ship_divisions');
    }
}
