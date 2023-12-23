<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constante extends Model
{
    use HasFactory, HasUlids;
    protected $fillable= ['seuil_alerte', 'depense_mensuel'];
}
