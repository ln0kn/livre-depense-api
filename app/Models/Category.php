<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        use HasFactory, HasUlids;
        
        public function articles(){
            return $this->hasMany(Article::class, 'categorie_id');
        }


    protected $fillable = ['libelle'];
}
