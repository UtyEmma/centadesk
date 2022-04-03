<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->string('course_id');
            $table->string('startdate');
            $table->string('enddate');
            $table->string('title')->nullable();
            $table->string('short_code')->nullable();
            $table->string('video')->nullable();
            $table->longText('images')->nullable();
            $table->integer('attendees')->nullable();
            $table->integer('price')->nullable();
            $table->integer('total_students');
            $table->string('class_link')->nullable();
            $table->string('status');
            $table->boolean('current');
            $table->string('currency');
            $table->string('earnings');
            $table->string('discount');
            $table->integer('discount_price')->nullable();
            $table->string('fixed')->nullable();
            $table->string('percent')->nullable();
            $table->string('time_limit')->nullable();
            $table->string('signup_limit')->nullable();
            $table->integer('count');
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
        Schema::dropIfExists('batches');
    }
};
