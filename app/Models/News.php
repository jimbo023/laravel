<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $news = "news";
    protected $categories = "categories";

    public function getNews(){
        return DB::table($this->news)
        ->select('id', 'title', 'author', 'discription')
        ->get()->toArray();
    }

    public function getNewsById($category, $id){
        return DB::table($this->news)
        ->where('category', '=', "$category")
        ->where('id', "=", "$id")->get()->toArray();
    }

    public function getNewsByCategory(string $category){
        return DB::table($this->news)->where('category', '=', "$category")
        ->get();
    }

}
