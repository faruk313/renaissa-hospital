<?php

use Illuminate\Database\Seeder;

class RefUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\RefUser', 50)->create();
    }
}
