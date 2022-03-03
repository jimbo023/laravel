<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    // public function news()
    // {
    //     $news = $this->getNews();
    //     return view('news.index',[
    //         'newsList' => $news
    //     ]);
    // }

    public function NewsCategory(string $category)
    {
        $newsList = $this->getNews();
        foreach($newsList as $news){
            if($news['category'] == $category){
                return view('news.index',[
                    'newsList' => $this->getNews($category)
                ]);
            }
        }
    }

    public function NewsShow($category, string $id)
    {
        // dd($category, $id);
        return view('news.show',[
            'show' => $this->getNews($category, $id)
        ]);
    }
}
