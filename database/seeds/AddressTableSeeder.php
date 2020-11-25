<?php

use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            ['street' => 'Dong Da'],
            ['state' => 'Hai Chau'],
            ['city' => 'Da Nang'],
            ['country' => 'Viet Nam'],
            ['zip_code' => '55000'],         
        ]);
        DB::table('addresses')->insert([
            ['street' => 'Phan Thanh'],
            ['state' => 'Hai Chau'],
            ['city' => 'Da Nang'],
            ['country' => 'Viet Nam'],
            ['zip_code' => '55000'],         
        ]);
    }
}
