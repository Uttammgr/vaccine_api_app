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
            $table->string('vaccine_name')->nullable();
            $table->text('vaccine_description')->nullable();
            $table->text('vaccine_side_effect')->nullable();
            $table->text('diseases_description')->nullable();
            $table->string('qualified_candidate')->nullable();
            $table->string('disqualified_candidate')->nullable();
            $table->text('precautions')->nullable();
            $table->string('required_doses')->nullable();
            $table->string('age')->nullable();
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
        Schema::dropIfExists('vaccines');
    }
}
