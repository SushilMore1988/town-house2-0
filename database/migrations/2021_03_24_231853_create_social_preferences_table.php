<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_preferences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->text('professional_interests')->nullable();
            $table->string('privacy_level')->nullable();
            $table->string('hygine_level')->nullable();
            $table->text('community_member_type')->nullable();
            $table->text('acceptance_level')->nullable();
            $table->text('lifestyle_balance')->nullable();
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
        Schema::dropIfExists('social_preferences');
    }
}
