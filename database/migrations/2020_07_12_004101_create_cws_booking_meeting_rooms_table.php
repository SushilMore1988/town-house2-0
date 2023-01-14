<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCwsBookingMeetingRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cws_booking_meeting_rooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cws_booking_id');
            $table->bigInteger('meeting_room_id');
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
        Schema::dropIfExists('cws_booking_meeting_rooms');
    }
}
