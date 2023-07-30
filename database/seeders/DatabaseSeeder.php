<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use app\City;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Provinceseeder::class);
        $this->call(CouriersTabSeeder::class);
    }
}
