<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCwsUserFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cws_user_filters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->enum('space_preference', ['Shared Desk', 'Dedicated Desk', 'Private Office', 'Any'])->default('Any');
            $table->enum('category', ['Gold', 'Silver', 'Bronze', 'All'])->default('All');
            $table->integer('number_of_people')->default(0);
            $table->unsignedBigInteger('min_price')->default(0);
            $table->unsignedBigInteger('max_price')->default(50000);
            $table->enum('meeting_room_occupancy', ['5 - 10', '10 - 20', '20 +', 'Any'])->default('Any');
            $table->enum('meet_category', ['Gold', 'Silver', 'Bronze', 'All'])->default('All');
            $table->unsignedBigInteger('meet_min_price')->default(0);
            $table->unsignedBigInteger('meet_max_price')->default(50000);
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
        Schema::dropIfExists('cws_user_filters');
    }
}
