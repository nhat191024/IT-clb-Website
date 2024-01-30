<?php

namespace App\Data\V1;

use App\Data\ApiData;

class LanguageData extends ApiData
{
    protected $safePrams = [
        'id' => ['eq'],
        'name' => ['eq'],
    ];
}
