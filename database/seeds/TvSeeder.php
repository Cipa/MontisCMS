<?php

use Illuminate\Database\Seeder;

class TvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tv::class)->create();
    }
}
