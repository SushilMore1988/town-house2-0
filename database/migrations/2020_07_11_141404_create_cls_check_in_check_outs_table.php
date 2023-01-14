<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClsCheckInCheckOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cls_check_in_check_outs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cls_id')->unsigned();
            $table->string('day')->nullable();
            $table->string('from',32)->nullable();
            $table->string('to',32)->nullable();
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
        Schema::dropIfExists('cls_check_in_check_outs');
    }
}
