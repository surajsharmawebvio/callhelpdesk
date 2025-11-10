<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class CompanyQuestion extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'company_questions';

    protected $primaryKey = '_id';
    protected $keyType = 'string';

    protected $fillable = [
        'company_id',
        'question',
        'answer',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
