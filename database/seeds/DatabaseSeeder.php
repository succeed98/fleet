<?php

use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Create Admin 
    	$admin = Role::firstOrCreate(['name' => 'admin']);
    	$admin->users()->create([
            'name'           => "Admin",
            'email'          => 'admin@test.io',
            'password'       => bcrypt('12345678')
        ]);

    	// Create Shipment Controller
    	$agent = Role::firstOrCreate(['name' => 'user']);
    	$agent->users()->create([
            'name'           => "Shipment Controller",
            'email'          => 'agent@test.io',
            'password'       => bcrypt('12345678')
        ]);

    }
}
