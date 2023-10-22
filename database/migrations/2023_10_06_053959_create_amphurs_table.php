<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmphursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amphurs', function (Blueprint $table) {
            $table->bigIncrements('AMPHUR_ID')->unsigned();
            $table->string('AMPHUR_CODE',4)->nullable();
            $table->string('AMPHUR_NAME',150)->nullable();
            $table->string('AMPHUR_NAME_ENG',150)->nullable();
            $table->bigInteger('GEO_ID')->nullable();
            $table->bigInteger('PROVINCE_ID')->nullable();
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
        Schema::dropIfExists('amphurs');
    }
}
