<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("amount");
            $table->bigInteger("trip_id")->unsigned();
            $table->bigInteger("trip_category_id")->unsigned();

            $table
                ->foreign("trip_id")
                ->references("id")
                ->on("trips")
                ->onDelete("cascade");

            $table->foreign("trip_category_id")
                ->references("id")
                ->on("trip_categories")
                ->onDelete("cascade");

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
        Schema::dropIfExists('prices');
    }
}
