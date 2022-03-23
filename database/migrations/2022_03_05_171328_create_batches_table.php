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
            $table->string('images')->nullable();
            $table->integer('attendees')->nullable();
            $table->integer('price')->nullable();
            $table->integer('total_students');
            $table->string('class_link')->nullable();
            $table->string('status');
            $table->boolean('current');
            $table->boolean('discounts');
            $table->string('time_discount')->nullable();
            $table->string('time_discount_rate')->nullable();
            $table->integer('time_discount_price')->nullable();
            $table->string('time_discount_percentage')->nullable();
            $table->string('signups_discount')->nullable();
            $table->string('signups_discount_rate')->nullable();
            $table->integer('signups_discount_price')->nullable();
            $table->integer('signups_discount_percentage')->nullable();
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
