<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpatialPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spatial_preferences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('liv')->nullable();
            $table->string('kit')->nullable();
            $table->string('din')->nullable();
            $table->string('bed')->nullable();
            $table->string('toi')->nullable();
            $table->boolean('share_liv')->default(0);
            $table->boolean('share_kit')->default(0);
            $table->boolean('share_din')->default(0);
            $table->boolean('share_bed')->default(0);
            $table->boolean('share_toi')->default(0);
            $table->string('max_members')->nullable();
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
        Schema::dropIfExists('spatial_preferences');
    }
}
