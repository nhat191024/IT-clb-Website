<?php
namespace App\Filers;

use Illuminate\Http\Request;

class ApiFilter {
    protected $safePrams = [];

    protected $columnMap = [];

    protected $operatorMap = [];
}