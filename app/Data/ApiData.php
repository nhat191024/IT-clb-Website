<?php

namespace App\Data;

use Illuminate\Http\Request;

class ApiData
{
    protected $safePrams = [];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
        'gte' => '>=',
        'lte' => '<='
    ];

    public function transform(Request $request)
    {
        $filterQuery = [];

        foreach ($this->safePrams as $colum => $operators) {
            $query = $request->query($colum);

            if (!isset($query)) {
                continue;
            }

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $filterQuery[] = [$colum, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $filterQuery;
    }
}
