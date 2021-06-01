<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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
        if(DB::table('users')->count() == 0){
            DB::table('users')->insert([
                'name' => 'Admin Admin',
                'email' => 'admin@serempre.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            User::factory()->count($this->number)->create();
        }else{
            User::factory()->count($this->number)->create();
        }
    }
}
