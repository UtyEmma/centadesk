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
            $table->string('course_id')->nullable();
            $table->string('startdate');
            $table->string('enddate');
            $table->string('mentor_id');
            $table->string('title');
            $table->string('short_code');
            $table->string('category');
            $table->string('excerpt');
            $table->longText('desc');
            $table->longText('objectives')->nullable();
            $table->string('video')->nullable();
            $table->string('images')->nullable();
            $table->integer('attendees')->nullable();
            $table->integer('price')->nullable();
            $table->integer('total_students');
            $table->string('class_link')->nullable();
            $table->longText('resources')->nullable();
            $table->string('status');
            $table->boolean('certificates');
            $table->string('currency');
            $table->string('earnings');
            $table->text('tags');
            $table->integer('rating');
            $table->string('discount');
            $table->integer('discount_price')->nullable();
            $table->string('fixed')->nullable();
            $table->string('percent')->nullable();
            $table->string('time_limit')->nullable();
            $table->string('signup_limit')->nullable();
            $table->string('access_link')->nullable();
            $table->boolean('paid');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('mentor_id')
                    ->references('unique_id')->on('users')
                    ->onDelete('cascade');


            $table->foreign('course_id')
                    ->references('unique_id')->on('courses')
                    ->onDelete('cascade');
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
