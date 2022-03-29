<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Factory::create();
        $data = [];
        for ($a = 0; $a < 5; $a++) {
            $data[] = [
                'title' => $faker->text(15),
                'discription' => $faker->text(50)
            ];
        }

        return $data;
    }
}
