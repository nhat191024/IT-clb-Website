<?php

namespace App\Data\V1;

use App\Data\ApiData;

class TypeData extends ApiData
{
    protected $safePrams = [
        'id' => ['eq'],
        'name' => ['eq'],
    ];
}
