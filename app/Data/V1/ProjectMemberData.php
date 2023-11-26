<?php

namespace App\Data\V1;

use App\Data\ApiData;

class MembersData extends ApiData
{
    protected $safePrams = [
        'id' => ['eq'],
        'Project' => ['eq'],
        'Member' => ['eq'],
    ];
}
