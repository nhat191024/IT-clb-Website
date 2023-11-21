<?php

namespace App\Data\V1;

use App\Data\ApiData;

class MembersData extends ApiData
{
    protected $safePrams = [
        'id' => ['eq'],
        'name' => ['eq'],
        'surname' => ['eq'],
        'birthday' => ['eq'],
        'joinDate' => ['eq'],
        'major' => ['eq'],
        'course' => ['eq'],
        'mail' => ['eq'],
        'phone' => ['eq'],
        'username' => ['eq'],
        'active' => ['eq'],
        'role' => ['eq'],
    ];
}
