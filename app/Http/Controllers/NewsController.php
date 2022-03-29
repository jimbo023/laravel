<?php

namespace App\Http\Controllers;

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

    public function NewsCategory(string $category)
    {
        $news = app(News::class);

        return view('news.index',[
            'newsList' => $news->getNewsByCategory($category)
        ]);
    }

    public function NewsShow($id, $category)
    {
        $news = app(News::class);

        return view('news.show',[
            'showList' => $news->getNewsById($id, $category)
        ]);
    }
}
