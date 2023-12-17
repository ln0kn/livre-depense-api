<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargeFixe extends Model
{
    
        use HasFactory, HasUlids;
    
    
        public function article()
        {
            return $this->belongsTo(Article::class);
        }
}
