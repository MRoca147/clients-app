<?php

namespace App\Console\Commands;

use Database\Seeders\CitiesTableSeeder;
use Database\Seeders\ClientsTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Console\Command;

class FillDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:fill {users : Amount of users} {cities : Amount of cities} {clients : Amount of clients}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate database with test data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $nclients =  $this->argument('clients');
        $nUsers =  $this->argument('users');
        $nCities =  $this->argument('cities');

        $this->info('Generating test data...');
        $usersSeeder = new UsersTableSeeder($nUsers);
        $usersSeeder->run();
        
        $citiesSeeder = new CitiesTableSeeder($nCities);
        $citiesSeeder->run();

        $clientsSeeder = new ClientsTableSeeder($nclients);
        $clientsSeeder->run();
        $this->info('Done.');

        return 0;
    }
}
