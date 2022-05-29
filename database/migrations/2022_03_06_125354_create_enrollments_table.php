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
    public function up(){
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->string('batch_id');
            $table->string('student_id');
            $table->string('course_id');
            $table->string('mentor_id');
            $table->string('transaction_id')->unique();
            $table->timestamps();

            $table->foreign('student_id')
                    ->references('unique_id')->on('users')
                    ->onDelete('cascade');

            $table->foreign('mentor_id')
                    ->references('unique_id')->on('users')
                    ->onDelete('cascade');

            $table->foreign('batch_id')
                    ->references('unique_id')->on('batches')
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
        Schema::dropIfExists('enrollments');
    }
};
