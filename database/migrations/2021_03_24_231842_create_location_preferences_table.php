<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_preferences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->text('currenct_work_location_1')->nullable();
            $table->text('currenct_work_location_2')->nullable();
            $table->string('mode_of_commute')->nullable();
            $table->string('time_of_daily_commute')->nullable();
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
        Schema::dropIfExists('location_preferences');
    }
}
