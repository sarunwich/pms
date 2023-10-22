<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('DISTRICT_ID')->unsigned();
            $table->string('DISTRICT_CODE',6)->nullable();
            $table->string('DISTRICT_NAME',150)->nullable();
            $table->bigInteger('AMPHUR_ID')->nullable();
            $table->bigInteger('PROVINCE_ID')->nullable();
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
        Schema::dropIfExists('districts');
    }
}
