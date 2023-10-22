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
            $table->string('agenciesTHname',250)->nullable();
            $table->string('agenciesENname',250)->nullable();
            $table->text('address')->nullable();
            $table->string('county',150)->nullable();
            $table->bigInteger('province')->nullable();
            $table->bigInteger('amphur')->nullable();
            $table->bigInteger('district')->nullable();
            $table->string('poststaion',5)->nullable();
            $table->string('tel',15)->nullable();
            $table->string('Email',250)->nullable();
            $table->string('web',250)->nullable();
            $table->string('type',3)->nullable();
            $table->string('work',3)->nullable();
            $table->string('fax',15)->nullable();
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
