<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTvValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tv_values', function (Blueprint $table) {
            $table->unsignedBigInteger('resource_id');
            // $table->foreign('resource_id')->references('id')->on('resources')->onDelete('cascade');

            $table->unsignedBigInteger('tv_id');
            // $table->foreign('tv_id')->references('id')->on('tvs')->onDelete('cascade');

            $table->longText('value')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tv_values');
    }
}
