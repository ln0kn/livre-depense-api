<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;
// use PHPUnit\Framework\Constraint\Operator;

class ArticleFilter extends ApiFilter{
    protected $safeParams = [
        'designation' => ['eq'],
    ];

    protected $columnMap = [
        'designation' =>'libelle'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];


}