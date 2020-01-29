<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTvTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tv_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        //defaults
        App\TvType::create(['name' => 'Text']);
        // App\TvType::create(['name' => 'Email']);
        // App\TvType::create(['name' => 'Image']);
        //...
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tv_types');
    }
}
