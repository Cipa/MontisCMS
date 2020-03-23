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
        App\TvType::create(['name' => 'Rich Text']);
        App\TvType::create(['name' => 'Text Area']);
        // App\TvType::create(['name' => 'Email']);
        // App\TvType::create(['name' => 'Image']);
        //...

        //first test TV
        $tv = App\Tv::create([
            'name' => 'customTitle',
            'caption' => 'Custom Title',
            'description' => 'A custom title',
            'type_id' => 1,
            'default_value' => 'Lorem Ipsum Custom Title',
        ]);
        $tv->templates()->attach(1);

        //second test tv
        $tv = App\Tv::create([
            'name' => 'moreContent',
            'caption' => 'More Content',
            'description' => 'More content',
            'type_id' => 2,
            'default_value' => '<p>Additional content</p>',
        ]);
        $tv->templates()->attach(1);

        //third test tv - will not be populated
        $tv = App\Tv::create([
            'name' => 'simpleText',
            'caption' => 'Simple Text',
            'description' => 'Simple Text',
            'type_id' => 3,
            'default_value' => 'Default simple text',
        ]);
        $tv->templates()->attach(1);

        //populate TV
        App\TvValue::create([
            'resource_id' => 1,
            'tv_id' => 1,
            'value' => 'Not the default Lorem Ipsum Custom Title',
        ]);

        //populate TV
        App\TvValue::create([
            'resource_id' => 1,
            'tv_id' => 2,
            'value' => '<p>Not the default additional content</p>',
        ]);
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
