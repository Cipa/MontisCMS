<?php

use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Resource::class)->create();
        factory(App\Resource::class)->create(['template_id' => 0]);
    }
}
