<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePathologyTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pathology_tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('test_code',50)->nullable();
            $table->string('test_name',100);
            $table->integer('test_price')->default('0');
            $table->integer('patient_discount')->default('0');
            $table->integer('doctor_commission')->default('0');
            $table->integer('broker_commission')->default('0');
            $table->integer('test_duration')->default('0');
            $table->string('test_room',11);
            $table->boolean('test_status')->default(true);
            $table->longText('test_suggestion')->nullable();
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
        Schema::dropIfExists('pathology_tests');
    }
}
