<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use Illuminate\Http\Request;

class SourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sources.index', [
            'sources' => Source::with('news')->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $source = Source::create($request->only(['name', 'urlSource']));
        if ($source) {
            return redirect()->route('admin.sources.index')
                ->with('success', 'Источник успешно добавлен');
        }

        return back() - with('error', 'Ошибка при добавлении источника');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        return view('admin.sources.edit', [
            'source' => $source
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Source $source)
    {
        $status = $source->fill($request->only(['name', 'urlSource']))->save();
        if ($status) {
            return redirect()->route('admin.sources.index')
                ->with('success', 'Источник успешно обновлен');
        }

        return back() - with('error', 'Ошибка при обновлении источника');
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
