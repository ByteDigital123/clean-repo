<?php

namespace App\Http\SearchFilters\Website\User;

use App\Http\SearchFilters\ApiSearchableTrait;
use App\Models\User;

class UserSearch
{
    protected static $model = User::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}
