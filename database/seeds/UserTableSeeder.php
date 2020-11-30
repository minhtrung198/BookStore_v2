<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     ['first_name' => 'user'],
        //     ['last_name' => 'user'],
        //     ['phone' => '0905653111'],
        //     ['email' => 'user@gmail.com'],
        //     ['password' => bcrypt('123123')],
        //     ['role_id' => 0],
        // ]);

        // DB::table('users')->insert([
        //     ['first_name' => 'admin'],
        //     ['last_name' => 'admin'],
        //     ['phone' => '0905653111'],
        //     ['email' => 'admin@gmail.com'],
        //     ['password' => bcrypt('123123')],
        //     ['role_id' => 1],
        // ]);
        // App\Models\User::create([
        //     'first_name' => 'admin',
        //     'last_name' => 'admin',
        //     'phone' => '0124555',
        //     'email' => 'plan@admin.com',
        //     'password' => bcrypt('123123'),
        //     'role_id' => 1,
        //     'address_id' => '1',
        // ]);

        App\Models\User::create([
            // 'first_name' => 'admin',
            // 'last_name' => 'admin',
            // 'phone' => '0124555',
            // 'email' => 'admin@gmail.com',
            // 'password' => bcrypt('123123'),
            // 'role_id' => 1,
            // 'address_id' => '3',
            'first_name' => 'user',
            'last_name' => 'user',
            'phone' => '0124555',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123123'),
            'role_id' => 2,
            'address_id' => '1',
        ]);
    }
}
