<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->bigIncrements('PROVINCE_ID')->unsigned();
            $table->string('PROVINCE_CODE',2)->nullable();
            $table->string('PROVINCE_NAME',150)->nullable();
            $table->string('PROVINCE_NAME_ENG',150)->nullable();
            $table->bigInteger('GEO_ID')->nullable();
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
        Schema::dropIfExists('provinces');
    }
}
