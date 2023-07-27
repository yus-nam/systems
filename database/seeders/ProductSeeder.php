<?php

// namespace Database\Seeders;

// use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//     //
        Product::factory()->count(10)->create();



        \DB::table('products')->insert([
        [
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => null,
            'product_name' => 'film of camera',
        ],
        [
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => null,
            'product_name' => 'instax12mini',
        ],
        [
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => null,
            'product_name' => 'instax reply',
        ],
    ]);





    }
}
