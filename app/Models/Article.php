<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Article extends Model
{
    use HasFactory, HasUlids;

    public function categorie(){
        return $this-> belongsTo(Category::class);
    }
    public function Charge()
    {
        return $this->belongsTo(ChargeFixe::class);
    }
}
