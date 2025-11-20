<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $primaryKey = 'id';
    public $incrementing = true;

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
        'company_category_id',
    ];

    protected $casts = [
        'published' => 'boolean',
        'ad_id' => 'integer',
        'popup_id' => 'integer',
        'company_category_id' => 'integer',
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
