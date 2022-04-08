<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Source extends Model
{
    use HasFactory;

    protected $sources = 'sources';

    protected $fillable = ['name', 'urlSource'];

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
