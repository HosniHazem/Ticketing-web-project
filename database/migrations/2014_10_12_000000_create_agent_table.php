<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('phone_no');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->integer('pin_code');
            $table->string('job_title');
            $table->string('address');
            $table->integer('time_zone_id');
            $table->string('organization');
            $table->string('Is_Sendmail_Password');
            $table->string('description');
            $table->string('profile_picture');
            $table->string('Is_Active');
            $table->integer('external_code');
            $table->integer('company_id');
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
        Schema::dropIfExists('agent');
    }
}
