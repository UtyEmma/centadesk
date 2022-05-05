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
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->integer('users')->default(0);
            $table->integer('students')->default(0);
            $table->integer('mentors')->default(0);
            $table->integer('courses')->default(0);
            $table->integer('batches')->default(0);
            $table->integer('ongoing_batches')->default(0);
            $table->integer('revenue')->default(0);
            $table->integer('earnings')->default(0);
            $table->integer('deposits')->default(0);
            $table->integer('enrollments')->default(0);
            $table->integer('deposit_amount')->default(0);
            $table->integer('withdrawals')->default(0);
            $table->integer('withdrawal_amount')->default(0);
            $table->integer('total_payout')->default(0);
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
        Schema::dropIfExists('stats');
    }
};
