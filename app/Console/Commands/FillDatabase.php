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
        //Run migrations
        $this->call('migrate');

        $this->info('Generating test data...');
        //Generate users
        $nUsers =  $this->argument('users');
        $usersSeeder = new UsersTableSeeder($nUsers);
        $usersSeeder->run();
        
        //Generate Cities
        $nCities =  $this->argument('cities');
        $citiesSeeder = new CitiesTableSeeder($nCities);
        $citiesSeeder->run();
        
        //Generate Clients
        $nclients =  $this->argument('clients');
        $clientsSeeder = new ClientsTableSeeder($nclients);
        $clientsSeeder->run();
        $this->info('Done.');

        return 0;
    }
}
