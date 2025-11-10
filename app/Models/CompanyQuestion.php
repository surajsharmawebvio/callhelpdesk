<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyQuestion extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'company_questions';

    protected $fillable = [
        'company_id',
        'question',
        'answer',
    ];
}
