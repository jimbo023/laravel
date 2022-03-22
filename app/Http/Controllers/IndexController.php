<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() 
    {
        $category = $this->getCategory();
        return view('category.index', [
            'categoryList' => $category
         ]);
    }
}
