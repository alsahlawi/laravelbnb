<?php

namespace Database\Seeders;

use App\Models\Bookable;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BookableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bookable::factory()->count(100)->create();
    }
}
