<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => '1',
            'name' => 'isAdmin',
        ]);
        DB::table('roles')->insert([
            'id' => '2',
            'name' => 'isUser',
        ]);
    }
}
