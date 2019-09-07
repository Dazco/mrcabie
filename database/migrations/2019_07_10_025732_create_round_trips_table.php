<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoundTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('round_trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("trip_category_id")->unsigned();
            $table->integer("base_distance");
            $table->integer("base_amount");
            $table->integer("extra_amount");

            $table->foreign("trip_category_id")
                ->references("id")
                ->on("trip_categories")
                ->onDelete("cascade");
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('round_trips');
    }
}
