<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCwsPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cws_packages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cws_id')->unsigned();
            $table->bigInteger('package_id')->unsigned();
            $table->string('status')->nullable();
            $table->string('amount')->nullable();
            $table->string('txnid')->nullable();
            $table->datetime('dated')->nullable();
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
        Schema::dropIfExists('cws_packages');
    }
}
