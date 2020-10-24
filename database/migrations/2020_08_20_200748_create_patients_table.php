<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_uid',11)->unique();
            $table->string('patient_name',50);
            $table->string('patient_mobile',11)->nullable();
            $table->tinyInteger('patient_age')->unsigned()->nullable();
            $table->boolean('patient_gender')->default(true);
            $table->string('patient_address',100)->nullable();
            $table->string('patient_note',100)->nullable();
            $table->boolean('patient_status')->default(true);
            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
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
        Schema::dropIfExists('patients');
    }
}
