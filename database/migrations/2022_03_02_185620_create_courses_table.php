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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->string('mentor_id');
            $table->string('name');
            $table->string('slug');
            $table->string('desc');
            $table->string('tags');
            $table->string('video');
            $table->longText('images');
            $table->integer('total_batches');
            $table->integer('total_students');
            $table->integer('reviews');
            $table->integer('rating');
            $table->integer('revenue');
            $table->string('active_batch')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('courses');
    }
};
