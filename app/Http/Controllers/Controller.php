<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCategory(): array
    {
        $category = ["Education", "Media", "Health", "Economic", "Sports"];
        return $category;
    }

    public function getNews(?string $category = null, $id = null): array
    {
        $faker = Factory::create();


        if ($id != null && $category != null) {
            return [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'category' => $category,
                'discription' => $faker->text(75)
            ];
        }

        if ($category) {
            $id = 0;
            for ($a = 0; $a < 5; $a++) {
                $id = $id + 1;
                $data[] = [
                    'id' => $id,
                    'title' => $faker->jobTitle(),
                    'author' => $faker->userName(),
                    'category' => $category,
                    'discription' => $faker->text(75)
                ];
            }
            return $data;
        }



        $data = [];
        $id = 0;
        $indexCategory = 0;
        for ($i = 0; $i < 5; $i++) {
            for ($a = 0; $a < 5; $a++) {
                $id = $id + 1;
                $data[] = [
                    'id' => $id,
                    'title' => $faker->jobTitle(),
                    'author' => $faker->userName(),
                    'category' => $this->getCategory()[$indexCategory],
                    'discription' => $faker->text(75)
                ];
            }
            $indexCategory++;
        }

        return $data;
    }
}
