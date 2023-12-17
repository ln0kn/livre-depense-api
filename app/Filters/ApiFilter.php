<?php

namespace App\Filters;

// use App\Services\ApiFilter;
use Illuminate\Http\Request;
// use PHPUnit\Framework\Constraint\Operator;

class ApiFilter{
    protected $safeParams = [];

    protected $columnMap = [];

    protected $operatorMap = [];

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