<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_legal');
            $table->bigInteger('person_id')->unsigned()->nullable();
            $table->foreign('person_id')->references('id')->on('people');
            $table->bigInteger('legal_id')->unsigned()->nullable();
            $table->foreign('legal_id')->references('id')->on('legals');
            $table->string('RTN',20);
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
        Schema::dropIfExists('clients');
    }
}
