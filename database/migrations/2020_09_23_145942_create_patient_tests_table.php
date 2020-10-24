<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('test_date');

            $table->unsignedBigInteger('patient_test_invoice_id');
            $table->foreign('patient_test_invoice_id')->references('id')->on('patient_test_invoices');

            $table->unsignedBigInteger('test_id');
            $table->foreign('test_id')->references('id')->on('pathology_tests');

            $table->date('delivery_date');
            $table->integer('test_price');
            $table->integer('test_discount');
            $table->integer('test_net_amount');
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
        Schema::dropIfExists('patient_tests');
    }
}
