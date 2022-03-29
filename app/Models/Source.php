<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Source extends Model
{
    use HasFactory;

    protected $sources = 'sources';

    public function getSources(){
        return DB::table($this->sources)
        ->get()->toArray();
    }

    public function getSourcesById($id){
        return DB::table($this->sources)->find($id);
    }
}
