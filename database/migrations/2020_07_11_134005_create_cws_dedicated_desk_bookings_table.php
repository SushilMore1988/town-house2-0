<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCwsDedicatedDeskBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cws_dedicated_desk_bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cws_booking_id');
            $table->bigInteger('no_of_desk');
            $table->string('duration');
            $table->double('price');
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
        Schema::dropIfExists('cws_dedicated_desk_bookings');
    }
}
