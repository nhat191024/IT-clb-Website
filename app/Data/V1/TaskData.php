<?php

namespace App\Data\V1;

use App\Data\ApiData;

class MembersData extends ApiData
{
    protected $safePrams = [
        'Id' => ['eq'],
        'Job' => ['eq'],
        'Project' => ['eq'],
        'WorkMember' => ['eq'],
    ];
}
