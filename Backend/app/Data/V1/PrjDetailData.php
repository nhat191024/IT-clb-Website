<?php

namespace App\Data\V1;

use App\Data\ApiData;

class PrjDetailData extends ApiData
{
    protected $safePrams = [
        'leaderID' => ['eq'],
        'projectID' => ['eq'],
        'description' => ['eq'],
        'projectSrc' => ['eq'],
        'status' => ['eq'],
        'show' => ['eq'],
        'startDate' => ['eq'],
        'endDate' => ['eq'],
    ];
}
