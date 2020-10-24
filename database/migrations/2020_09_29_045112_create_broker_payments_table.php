<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrokerPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broker_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('invoice_date');

            $table->unsignedBigInteger('broker_id');
            $table->foreign('broker_id')->references('id')->on('ref_users');

            $table->integer('paid_amount');
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
        Schema::dropIfExists('broker_payments');
    }
}
