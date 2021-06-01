<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    protected $number;

    public function __construct($number = null)
    {
        $this->number = $number;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::factory()->count($this->number)->create();
    }
}
