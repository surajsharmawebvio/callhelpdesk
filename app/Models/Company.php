<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Company extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'company';

    protected $casts = [
        'right_ad_image' => 'string',
    ];

    protected $fillable = [
        'content',
        'name',
        'phone',
        'ulpad',
        'url',
        'ad_id',
        'popup_id',
        'published',
        'right_ad_image',
    ];

    public function questions()
    {
        return $this->hasMany(CompanyQuestion::class, 'company_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(CompanyCategory::class, 'company_category_id', 'id');
    }
}
