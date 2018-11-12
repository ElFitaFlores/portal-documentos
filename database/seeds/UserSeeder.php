<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin user',
            'email' => 'admin',
            'password' => bcrypt('secret'),
            'type' => 'admin',
        ]);
    }
}
