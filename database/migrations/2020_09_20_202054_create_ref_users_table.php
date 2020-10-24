<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref_user_id')->unique();
            $table->string('ref_user_name');
            $table->string('ref_user_mobile')->unique();
            $table->string('ref_user_note')->nullable();
            $table->boolean('ref_user_status')->default(true);
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
        Schema::dropIfExists('ref_users');
    }
}
