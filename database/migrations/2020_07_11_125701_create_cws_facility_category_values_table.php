<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCwsFacilityCategoryValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cws_facility_category_values', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cws_facility_category_id')->unsigned();
            $table->string('value');
            $table->string('icon_image')->nullable();
            $table->string('rating_category')->nullable();
            $table->bigInteger('position')->nullable();
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
        Schema::dropIfExists('cws_facility_category_values');
    }
}
