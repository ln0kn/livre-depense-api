<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Concerns\HasUlids;
class Depense extends Model
{
    
        use HasFactory, HasUlids;
    
        public function article(){
            return $this->belongsTo(Article::class);
        }



    protected $fillable = ['designation', 'quantite', 'montant', 'paid_date','article_id'];
}
