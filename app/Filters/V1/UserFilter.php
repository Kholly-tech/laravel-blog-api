<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class UserFilter extends ApiFilter {
    protected $allowedParams = [
        'name' => ['eq', 'in'],
        'city' => ['eq', 'in'],
        'email' => ['eq', 'in'],
        'state' => ['eq', 'in'],
        'postalCode' => ['eq', 'gt', 'lt', 'in'],
        'id' => ['eq', 'gt', 'lt', 'gte', 'lte']
    ];

    protected $columnMap = [
        'name' => 'name',
        'city' => 'city',
        'email' => 'email',
        'state' => 'state',
        'postalCode' => 'postal_code',
        'id' => 'id'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!=',
        'in' => 'like'
    ];
} 