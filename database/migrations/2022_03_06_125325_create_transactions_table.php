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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id');
            $table->string('reference');
            $table->string('user_id');
            $table->string('type');
            $table->string('status');
            $table->integer('amount');
            $table->string('currency');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('user_id')
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
        Schema::dropIfExists('transactions');
    }
};
