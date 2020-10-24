<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorIncomeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_income_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('invoice_date');
            $table->string('invoice_no');

            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id')->references('id')->on('invoices');

            $table->unsignedBigInteger('prescription_ticket_id')->nullable();
            $table->foreign('prescription_ticket_id')->references('id')->on('prescription_tickets');

            // $table->unsignedBigInteger('report_ticket_id')->nullable();
            // $table->foreign('report_ticket_id')->references('id')->on('report_tickets');

            $table->unsignedBigInteger('patient_test_invoice_id')->nullable();
            $table->foreign('patient_test_invoice_id')->references('id')->on('patient_test_invoices');

            // $table->unsignedBigInteger('patient_admission_id')->nullable();
            // $table->foreign('patient_admission_id')->references('id')->on('patient_admissions');

            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');

            $table->integer('doctor_income_amount');
            $table->integer('doctor_payable_amount');
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
        Schema::dropIfExists('doctor_income_histories');
    }
}
