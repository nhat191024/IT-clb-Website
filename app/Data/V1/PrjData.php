<?php

namespace App\Data\V1;

use App\Data\ApiData;

class PrjData extends ApiData
{
    protected $safePrams = [
        'id' => ['eq'],
        'name' => ['eq'],
        'StartDate' => ['eq'],
        'WorkTime' => ['eq'],
        'EndDate' => ['eq'],
        'ProjectSrc' => ['eq'],
        'Status' => ['eq'],
    ];
}
