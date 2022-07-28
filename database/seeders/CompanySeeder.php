<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $params = [
            ['id' => 1, 'name' => 'TheKirishima'],
            ['id' => 2, 'name' => 'KenOn'],
            ['id' => 3, 'name' => 'FosterPlus'],
        ];
        DB::table('companies')->insert($params);
    }
}
