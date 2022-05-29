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
        Schema::create('batch_resources', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->string('batch_id');
            $table->string('link');
            $table->string('title');
            $table->string('description');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('batch_id')
                    ->references('unique_id')->on('batches')
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
        Schema::dropIfExists('batch_resources');
    }
};
