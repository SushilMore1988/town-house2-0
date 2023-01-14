<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCwsMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cws_masters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cws_id');
            $table->string('review_text_master')->nullable();
            $table->string('special_attribute')->nullable();
            $table->string('tag_line')->nullable();
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
        Schema::dropIfExists('cws_masters');
    }
}
