<?php

namespace App\Data\V1;

use App\Data\ApiData;

class BlogData extends ApiData
{
    protected $safePrams = [
        'id' => ['eq'],
        'name' => ['eq'],
        'Author' => ['eq'],
    ];
}
