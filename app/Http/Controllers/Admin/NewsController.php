<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use App\Models\Source;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.index', [
            'newsList' => News::with('category')->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create', [
            'categories' => Category::select('id', 'title')->get(),
            'sources' => Source::select('id', 'urlSource')->get()
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = News::create($request->only(['category_id', 'title', 'author', 'discription', 'image']));
        if($news){
            return redirect()->route('admin.news.index')
            ->with('success', 'Новость успешно добавлена');
        }

        return back()-with('error', 'Ошибка при добавлении новости');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            "news" => $news,
            'categories' => Category::select('id','title')->get(),
            'sources' => Source::select('id', 'urlSource')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $status = $news->fill($request->only(['category_id', 'title', 'author', 'discription', 'image', 'source_id']))
                            ->save();
        if($status) {
            return redirect()->route('admin.news.index')
            ->with('success', 'Новость успешно обновлена');
        }

        return back()-with('error', 'Ошибка при обновлении новости');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
