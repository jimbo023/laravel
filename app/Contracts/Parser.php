<?php

namespace App\Contracts;

interface Parser
{
    /**
     * @param string $url
     * @return void
     */
    public function saveNews(string $url): void;
}
