<?php

namespace App\Data\V1;

use App\Data\ApiData;

class PrjMemData extends ApiData
{
    protected $safePrams = [
        'Id' => ['eq'],
        'Project' => ['eq'],
        'Member' => ['eq'],
    ];
}
