<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');

            //$table->foreign('user_id')->references('id')->on('users');
        });

        //defaults
        App\Type::create(['name' => 'Document']);
        App\Type::create(['name' => 'WebLink']);
        App\Type::create(['name' => 'SymLink']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
