<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Khoa học tuổi trẻ'],
            ['description' => 'Cuốn Sách Khổng Lồ Về Các Thí Nghiệm Khoa Học (Với Hơn 100 Thí Nghiệm Đơn Giản Và Cực Kỳ Thú Vị!)'],
            ['quantity' => 50],
            ['image' => 'public/img/khoahoc2.jpg'],
            ['author_id' => 3],
            ['publisher_id' => 3],
            ['categories_id' => 2],
            
        ]);
    }
}
