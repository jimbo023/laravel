<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $welcomeText = "Добро пожаловать в новостной агрегатор! Он ещё в разработке. Зайдите сюда через некоторое время.";
        return view('index', [
            "welcomeText" => $welcomeText
        ]);
    }
}
