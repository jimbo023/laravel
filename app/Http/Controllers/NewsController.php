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

    public function NewsCategory()
    {
        return view('news.index',[
            'newsList' => News::with('category')->paginate(5)
        ]);
    }

    public function NewsShow(News $news)
    {
        return view('news.show',[
            'showList' => $news
        ]);
    }
}
