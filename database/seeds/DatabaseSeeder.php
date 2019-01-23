<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {	Model::unguard();
        //$this->call(UsersTableSeeder::class);

        $role1  = Role::create(['name' => 'Adiministrator' ]);
        $role2 = Role::create(['name' => 'Subscriper' ]);

        
         Model::reguard();

    }
}
