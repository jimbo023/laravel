<?php

namespace App\Http\Controllers;

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
        $newsList = $this->getNews();

        return view('news.index',[
            'newsList' => $this->getNews($category)
        ]);
    }

    public function NewsShow($category, string $id)
    {
        // dd($category, $id);
        return view('news.show',[
            'show' => $this->getNews($category, $id)
        ]);
    }
}
