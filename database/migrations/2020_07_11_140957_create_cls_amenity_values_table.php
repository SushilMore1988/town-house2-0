<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClsAmenityValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cls_amenity_values', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cls_amenity_category_id')->unsigned();
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
        Schema::dropIfExists('cls_amenity_values');
    }
}
