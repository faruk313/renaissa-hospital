<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('ticket_date');
            $table->integer('serial_no')->nullbale();
            $table->time('serial_time')->default('18:00:00');

            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');

            $table->unsignedBigInteger('person_id')->unsigned()->nullable();
            $table->foreign('person_id')->references('id')->on('ref_users');

            $table->integer('doctor_fees')->default(0);
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
        Schema::dropIfExists('prescription_tickets');
    }
}
