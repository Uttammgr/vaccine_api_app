<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('vaccine_name');
            $table->text('vaccine_description');
            $table->text('vaccine_side_effect');
            $table->text('diseases_description');
            $table->string('qualified_candidate');
            $table->string('disqualified_candidate');
            $table->string('precautions');
            $table->string('required_doses');
            $table->string('taken_doses');
            $table->string('age');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaccines');
    }
}
