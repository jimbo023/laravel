<?php

namespace App\Services;

use App\Contracts\Parser as Contract;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as Parsers;

class ParserService implements Contract
{
    protected string $url;

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function saveNews()
    {
        $xml = Parsers::load($this->url);
        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);
        $json = json_encode($data);
        $e = explode("/", $this->url);
        $filename = end($e);
        Storage::put("news/$filename", $json);
    }

}