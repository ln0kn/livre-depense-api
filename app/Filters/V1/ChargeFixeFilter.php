<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
// use PHPUnit\Framework\Constraint\Operator;

class ChargeFixeFilter extends ApiFilter{
    
    protected $safeParams = [
        'montant' => ['eq', 'lt', 'lte', 'gt', 'gte', 'neq'],
        'quantite' => ['eq', 'lt', 'lte', 'gt', 'gte', 'neq'],
        'frequence' => ['eq', 'lt', 'lte', 'gt', 'gte', 'neq'],
    ];

    protected $columnMap = [
        'frequence' =>'periodisite',
        'montant' =>'montant',
        'quantite' =>'quantite',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'neq' => '!=',
    ];
}