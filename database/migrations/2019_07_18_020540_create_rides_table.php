<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref')->nullable();
            $table->string("ride_type");
            $table->string("ride_status")->default("BOOKED");
            $table->bigInteger("ride_category_id")->unsigned();
            $table->string("payment_type")->default("full");
            $table->integer("amount_paid");
            $table->integer("amount_owed")->default(0);
            $table->string("payment_status")->default("PENDING");
            $table->string("pickup_address");
            $table->string("pickup_city");
            $table->date("pickup_date");
            $table->time("pickup_time");
            $table->string("drop_address");
            $table->string("drop_city");
            $table->date("return_date")->nullable();
            $table->time("return_time")->nullable();
            $table->text("requests")->nullable();
            $table->bigInteger("client_id")->unsigned();
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
        Schema::dropIfExists('rides');
    }
}
