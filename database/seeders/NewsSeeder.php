<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getNews());
    }

    private function getNews()
    {
        $faker = Factory::create();
        $data = [];
        for ($a = 0; $a < 10; $a++) {
            $data[] = [
                'category_id' => 1,
                'source_id' => 1,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(250, 170),
                'discription' => $faker->text(75)
            ];
        }
        return $data;
    }

}
