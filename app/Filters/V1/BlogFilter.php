<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class BlogFilter extends ApiFilter {

    // $table->foreignId('user_id')->constrained();
    // $table->string('title');
    // $table->text('content');
    // $table->json('likes')->nullable();

    protected $allowedParams = [
        'userId' => ['eq'],
        'title' => ['eq', 'in'],
        'content' => ['eq', 'in'],
        'id' => ['eq', 'gt', 'lt', 'gte', 'lte']
    ];

    protected $columnMap = [
        'userId' => 'user_id',
        'title' => 'title',
        'content' => 'content',
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