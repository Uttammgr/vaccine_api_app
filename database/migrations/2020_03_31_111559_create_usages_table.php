<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usages', function (Blueprint $table) {
            $table->bigIncrements('usages_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('vaccine_id')->nullable();
            $table->string('taken_doses');
            $table->string('remaining_doses');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vaccine_id')->references('id')->on('vaccines')->onDelete('cascade');
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
        Schema::dropIfExists('usages');
    }
}
