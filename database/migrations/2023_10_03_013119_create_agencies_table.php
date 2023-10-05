<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->id();
            $table->string('agenciesTHname',250);
            $table->string('agenciesENname',250);
            $table->text('address');
            $table->string('county',25);
            $table->tinyInteger('amphur')->nullable();
            $table->tinyInteger('district')->nullable();
            $table->tinyInteger('poststaion')->nullable();
            $table->string('tel',15);
            $table->string('Email',250);
            $table->string('web',250);
            $table->string('type',3);
            $table->string('work',3);
            $table->string('fax',15);
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
        Schema::dropIfExists('agencies');
    }
}
