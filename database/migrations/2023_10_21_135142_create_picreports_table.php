<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picreports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reportstd_id')->nullable();
            $table->foreign('reportstd_id')->references('id')->on('reportstds')->onDelete('cascade');
            $table->string('picname',150)->nullable();
            $table->string('pictile',500)->nullable();
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
        Schema::dropIfExists('picreports');
    }
}
