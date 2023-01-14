<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCwsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cws', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('type');
            $table->string('name');
            $table->string('slug');
            $table->string('unique_name');
            $table->string('country_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('user_role')->nullable();
            $table->text('description')->nullable();
            $table->text('information')->nullable();
            $table->string('notify_email')->nullable();
            $table->text('contact_details')->nullable();
            $table->decimal('progress_percent')->nullable();
            $table->smallInteger('is_approved');
            $table->string('status')->nullable();
            $table->decimal('admin_rating')->nullable();
            $table->Integer('total_points')->nullable();
            $table->text('address')->nullable();
            $table->text('size')->nullable();
            $table->text('facilities')->nullable();
            $table->text('opening_hours')->nullable();
            $table->text('images')->nullable();
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
        Schema::dropIfExists('cws');
    }
}
