<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class AmendmentSearchSCope extends SearchScope
{
   protected $searchColumns = [
        'parliamentary',
        'amendment',
        'caption',
        'work_program',
        'nature_of_expense',
        'price',
        'viability'];
}
