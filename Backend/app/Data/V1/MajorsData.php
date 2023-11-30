<?php

namespace App\Data\V1;

use App\Data\ApiData;

class MajorsData extends ApiData
{
    protected $safePrams = [
        'Id' => ['eq'],
        'Name' => ['eq'],
    ];
}
