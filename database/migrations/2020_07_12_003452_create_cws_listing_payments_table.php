<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCwsListingPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cws_listing_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cws_id');
            $table->string('status');
            $table->string('payment_for');
            $table->string('amount');
            $table->string('txnid');
            $table->string('firstname');
            $table->string('email');
            $table->string('phone');
            $table->dateTime('dated');
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
        Schema::dropIfExists('cws_listing_payments');
    }
}
