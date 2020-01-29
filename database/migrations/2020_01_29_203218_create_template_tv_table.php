<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateTvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_tv', function (Blueprint $table) {
            $table->unsignedBigInteger('template_id');
            $table->foreign('template_id')->references('id')->on('templates')->onDelete('cascade');

            $table->unsignedBigInteger('tv_id');
            $table->foreign('tv_id')->references('id')->on('tvs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template_tv');
    }
}
