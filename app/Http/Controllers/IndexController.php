<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() 
    {
        $category = app(Category::class);
        return view('category.index', [
            'categoryList' => $category->getCategories()
         ]);
    }
}
