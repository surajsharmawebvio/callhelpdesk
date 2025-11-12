<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class CompanyCategory extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'company_categories';

    protected $primaryKey = '_id';
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function companies()
    {
        return $this->hasMany(Company::class, 'company_category_id', 'id');
    }
}
