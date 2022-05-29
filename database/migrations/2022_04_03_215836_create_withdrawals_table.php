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
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id');
            $table->string('user_id');
            $table->integer('amount');
            $table->string('account_no')->nullable();
            $table->string('account_name')->nullable();
            $table->string('bank')->nullable();
            $table->string('type');
            $table->string('currency');
            $table->string('wallet_key')->nullable();
            $table->string('reference');
            $table->string('status');
            $table->timestamps();

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
        Schema::dropIfExists('withdrawals');
    }
};
