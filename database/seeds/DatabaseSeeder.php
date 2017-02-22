<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\User',1)->create();
        factory('App\Producto',20)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
