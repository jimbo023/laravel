<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $news = "news";
    // protected $categories = "categories";

    protected $fillable = ['category_id', 'title', 'author', 'discription', 'image', 'source_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function source(): HasMany
    {
        return $this->hasMany(Source::class, 'source_id', 'id');
    }

    // public function getNewsById($category, $id){
    //     return DB::table($this->news)
    //     ->where('category', '=', "$category")
    //     ->where('id', "=", "$id")->get()->toArray();
    // }

    // public function getNewsByCategory(string $category){
    //     return DB::table($this->news)->where('category', '=', "$category")
    //     ->get();
    // }

}
