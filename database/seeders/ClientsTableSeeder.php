<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
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
        Client::factory()->count($this->number)->create();
    }
}
