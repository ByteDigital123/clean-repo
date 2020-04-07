<?php

namespace App\Http\SearchFilters\Website\ModelHasPermission;

use App\Models\ModelHasPermission;
use App\Http\SearchFilters\ApiSearchableTrait;

class ModelHasPermissionSearch
{
    protected static $model = ModelHasPermission::class;
    protected static $namespace = __NAMESPACE__;

    use ApiSearchableTrait;
}