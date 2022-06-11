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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->string('batch_id');
            $table->string('sender_id');
            $table->text('message');
            $table->timestamps();

            $table->foreign('sender_id')
                    ->references('unique_id')->on('users')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('messages');
    }
};
