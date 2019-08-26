<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name")->unique();
            $table->string("car");
            $table->integer("seats");
            $table->integer("bags");
            $table->integer("waiting");
            $table->integer("extra_dist");
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
        Schema::dropIfExists('trip_categories');
    }
}
