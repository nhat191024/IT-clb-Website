<?php

namespace App\Data\V1;

use App\Data\ApiData;

class FrameworkData extends ApiData
{
    protected $safePrams = [
        'id' => ['eq'],
        'name' => ['eq'],
    ];
}
