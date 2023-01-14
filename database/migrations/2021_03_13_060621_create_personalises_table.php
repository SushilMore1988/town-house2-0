<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('profession')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('current_location', 255)->nullable();
            $table->string('hometown', 255)->nullable();
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
        Schema::dropIfExists('personalises');
    }
}
