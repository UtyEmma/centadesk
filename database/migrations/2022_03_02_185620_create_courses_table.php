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
            $table->string('category');
            $table->integer('total_batches');
            $table->integer('total_students');
            $table->integer('rating');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('mentor_id')
                        ->references('unique_id')->on('users')
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
        Schema::dropIfExists('courses');
    }
};
