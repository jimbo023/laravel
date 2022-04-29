<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // public function index()
    // {
    //     $news = $this->getNews();
    //     return view('news.index',[
    //         'newsList' => $news
    //     ]);
    // }

    public function NewsCategory($newsCategoryId)
    {
        $id = [];
        $categories = Category::all()->where("title", "$newsCategoryId");
        foreach($categories as $category){
            $id = $category->id;
        };

        return view('news.index',[
            'newsList' => News::where('category_id', $id)->paginate(10)
        ]);
    }

    public function NewsShow($category, $id)
    {
        return view('news.show',[
            'show' => News::find($id)
        ]);
    }
}
