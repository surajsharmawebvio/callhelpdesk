<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyCategory extends Model
{
    protected $table = 'company_categories';

    protected $fillable = [
        'name',
        'description',
        'slug',
        'parent_id',
    ];

    public function companies()
    {
        return $this->hasMany(Company::class, 'company_category_id', 'id');
    }

    public function subCompanies()
    {
        return $this->hasMany(Company::class, 'sub_category_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(CompanyCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(CompanyCategory::class, 'parent_id');
    }

    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeChildren($query)
    {
        return $query->whereNotNull('parent_id');
    }
}
