<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('doctor_id');
            $table->integer('type');
            $table->integer('prescription_fees')->default('0');
            $table->integer('prescription_payable')->default('0');
            $table->integer('report_fees')->default('0');
            $table->integer('report_payable')->default(0);
            $table->integer('salary_or_contract_fees')->default('0');
            $table->boolean('test_commission')->default(false);
            $table->string('photo')->nullable();
            $table->string('name');
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->integer('department_id')->default('0');
            $table->integer('chamber_id')->default('0');
            $table->date('dob')->nullable();
            $table->boolean('gender')->default(true);
            $table->string('degrees')->nullable();
            $table->string('mailing_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('present_institute')->nullable();
            $table->string('institute_designation')->nullable();
            $table->string('institute_address')->nullable();
            $table->date('joining_date')->nullable();
            $table->boolean('leave_or_present_status')->default(true);
            $table->time('from_time')->default('21:00')->format('H:i');
            $table->time('to_time')->default('18:00')->format('H:i');
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->string('leave_or_present_note')->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('doctors');
    }
}
