<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Article extends Model
{
    use HasFactory, HasUlids;

    public function category(){
        return $this-> belongsTo(Category::class);
    }
}
