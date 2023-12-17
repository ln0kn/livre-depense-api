<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;
// use PHPUnit\Framework\Constraint\Operator;

class CategoryFilter extends ApiFilter{
    protected $safeParams = [
        'nom' => ['eq'],
    ];

    protected $columnMap = [
        'nom' =>'libelle'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];


}