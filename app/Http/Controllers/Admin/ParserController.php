<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser as ContractParser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, ContractParser $parser)
    {
        $parser->setUrl('https://news.yandex.ru/music.rss')
                ->saveNews();
        return response("Парсинг стартовал");
    }
}
