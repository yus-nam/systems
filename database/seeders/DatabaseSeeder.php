<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /** 実行したいSeederをここに登録 */
    private const SEEDERS = [
        CompanySeeder::class,
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(2)->create();
        foreach(self::SEEDERS as $seeder) {
            $this->call($seeder);
        }

    }
}
