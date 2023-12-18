<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teach_buses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teachID')->nullable();
            $table->foreign('teachID')->references('id')->on('users');
            $table->unsignedBigInteger('Stdid')->nullable();
            $table->foreign('Stdid')->references('id')->on('users');
            $table->string('year');
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
        Schema::dropIfExists('teach_buses');
    }
}
