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
        'is_main',
    ];

    protected $casts = [
        'is_main' => 'boolean',
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
        return $query->where('is_main', true);
    }

    public function scopeChildren($query)
    {
        return $query->where('is_main', false);
    }

    /**
     * Boot the model.
     */
    protected static function booted(): void
    {
        static::saving(function ($category) {
            // Automatically set is_main based on parent_id
            $category->is_main = is_null($category->parent_id);
        });
    }
}
