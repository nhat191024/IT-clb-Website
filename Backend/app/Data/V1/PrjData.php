<?php

namespace App\Data\V1;

use App\Data\ApiData;

class PrjData extends ApiData
{
    protected $safePrams = [
        'id' => ['eq'],
        'code' => ['eq'],
        'name' => ['eq'],
    ];
}
