<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySuggestion extends Model
{
    protected $table = 'company_suggestions';

    protected $fillable = [
        'name',
        'email',
        'suggestion_name',
    ];
}
