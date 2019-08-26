<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("driver_id")->unsigned();
            $table->bigInteger("ride_id")->unsigned();
            $table->string("status")->default("PENDING");
            $table->foreign("driver_id")->references("id")->on("drivers")->onDelete("cascade");
            $table->foreign("ride_id")->references("id")->on("rides")->onDelete("cascade");
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
        Schema::dropIfExists('bids');
    }
}
