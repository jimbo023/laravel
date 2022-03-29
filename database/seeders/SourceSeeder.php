<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert($this->getSources());
    }

    private function getSources()
    {
        $faker = Factory::create();
        $data = [];
        for ($a = 0; $a < 10; $a++) {
            $data[] = [
                'name' => $faker->title(),
                'urlSource' => $faker->url()
            ];
        }
        return $data;
    }
}
