<?php

namespace App\Data\V1;

use App\Data\ApiData;

class PrjTaskData extends ApiData
{
    protected $safePrams = [
        'Id' => ['eq'],
        'Job' => ['eq'],
        'Project' => ['eq'],
        'WorkMember' => ['eq'],
    ];
}
