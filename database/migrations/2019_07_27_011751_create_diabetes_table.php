<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiabetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diabetes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('age');
            $table->string('bsfast');
            $table->string('bspp');
            $table->string('plasma_r');
            $table->string('plasma_f');
            $table->string('hba1c');
            $table->string('type');
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
        Schema::dropIfExists('diabetes');
    }
}
