<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('invoice_date');
            $table->string('invoice_no');

            $table->unsignedBigInteger('prescription_ticket_id')->nullable();
            $table->foreign('prescription_ticket_id')->references('id')->on('prescription_tickets');

            // $table->unsignedBigInteger('report_ticket_id')->nullable();
            // $table->foreign('report_ticket_id')->references('id')->on('report_tickets');

            $table->unsignedBigInteger('patient_test_invoice_id')->nullable();
            $table->foreign('patient_test_invoice_id')->references('id')->on('patient_test_invoices');

            // $table->unsignedBigInteger('patient_admission_id')->nullable();
            // $table->foreign('patient_admission_id')->references('id')->on('patient_admissions');

            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');

            $table->unsignedBigInteger('person_id')->unsigned()->nullable();
            $table->foreign('person_id')->references('id')->on('ref_users');

            $table->integer('payable_amount')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('total_amount')->default(0);
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
        Schema::dropIfExists('invoices');
    }
}
