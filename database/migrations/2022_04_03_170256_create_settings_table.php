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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->string('base_currency')->unique();
            $table->integer('charges')->unique();
            $table->string('app_name')->unique();
            $table->string('rave_public_key')->unique();
            $table->string('rave_secret_key')->unique();
            $table->string('rave_api_base_url')->unique();
            $table->string('paystack_base_url')->unique();
            $table->string('paystack_secret')->unique();
            $table->string('paystack_public')->unique();
            $table->string('cloudinary_url')->unique();
            $table->string('facebook_client_id')->unique();
            $table->string('facebook_client_secret')->unique();
            $table->string('facebook_redirect_uri')->unique();
            $table->string('google_client_id')->unique();
            $table->string('google_client_secret')->unique();
            $table->string('google_redirect_uri')->unique();
            $table->string('exchangerate_api_url')->unique();
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
        Schema::dropIfExists('settings');
    }
};
