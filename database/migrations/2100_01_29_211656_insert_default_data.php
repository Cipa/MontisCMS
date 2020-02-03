<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertDefaultData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //defaults
        App\Type::create(['name' => 'Document']);
        App\Type::create(['name' => 'WebLink']);
        // App\Type::create(['name' => 'SymLink']);


        //defaults
        App\Template::create(['name' => 'Default', 'description' => 'Default Template']);

        //defaults
        App\TvType::create(['name' => 'Text']);
        // App\TvType::create(['name' => 'Email']);
        // App\TvType::create(['name' => 'Image']);
        //...

        $tv = App\Tv::create([
            'name' => 'test',
            'caption' => 'Test TV',
            'description' => 'Default Test TV',
            'type_id' => 1
        ]);

        $tv->templates()->attach(1);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
