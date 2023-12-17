<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;
// use PHPUnit\Framework\Constraint\Operator;

class DepenseFilter extends ApiFilter{
    protected $safeParams = [
        'libelle' => ['eq'],
        'montant' => ['eq', 'neq', 'lt', 'lte', 'gt', 'gte'],
        'quantite' => ['eq', 'neq', 'lt', 'lte', 'gt', 'gte'],
    ];

    protected $columnMap = [
        'libelle' =>'designation'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'neq' => '!=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];

    public  function transform(Request $request)
    {
        $eloQuery = [];

        foreach ($this->safeParams as $param => $operators) {
            $query = $request->query($param);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$param] ?? $param;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }

}