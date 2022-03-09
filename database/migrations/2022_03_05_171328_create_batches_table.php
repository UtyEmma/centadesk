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
            $table->string('duration');
            $table->string('video')->nullable();
            $table->string('images')->nullable();
            $table->integer('attendees')->nullable();
            $table->integer('price')->nullable();
            $table->integer('total_students');
            $table->string('class_link')->nullable();
            $table->string('status');
            $table->boolean('current');
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
