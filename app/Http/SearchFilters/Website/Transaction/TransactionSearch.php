<?php

namespace App\Http\SearchFilters\Website\Transaction;

use App\Models\Transaction;
use App\SearchFilters\ApiSearchableTrait;

class TransactionSearch
{
    protected static $model = Transaction::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
