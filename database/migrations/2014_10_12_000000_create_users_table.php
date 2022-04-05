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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->string('email')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('bank')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('crypto_address')->nullable();
            $table->string('total_batches');
            $table->string('total_courses');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->text('experience')->nullable();
            $table->text('qualification')->nullable();
            $table->string('total_reviews');
            $table->string('avg_rating');
            $table->string('interests')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('earnings');
            $table->string('affiliate_id');
            $table->string('kyc_status');
            $table->string('kyc_method')->nullable();
            $table->string('id_number')->nullable();
            $table->string('id_image')->nullable();
            $table->string('specialty')->nullable();
            $table->string('currency')->nullable();
            $table->string('desc')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('role');
            $table->boolean('is_verified');
            $table->boolean('approved');
            $table->string('status');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
