<?php

namespace App\Data\V1;

use App\Data\ApiData;

class MembersData extends ApiData
{
    protected $safePrams = [
        'Id' => ['eq'],
        'Name' => ['eq'],
        'Surname' => ['eq'],
        'Birthday' => ['eq'],
        'JoinDate' => ['eq'],
        'Major' => ['eq'],
        'Course' => ['eq'],
        'Mail' => ['eq'],
        'Phone' => ['eq'],
        'Username' => ['eq'],
        'Active' => ['eq'],
        'Role' => ['eq'],
    ];
}
