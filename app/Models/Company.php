<?php

namespace App\Models;

use App\Traits\HasSeo;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasSeo;

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

    /**
     * Get SEO title fallback.
     */
    public function getSeoTitleFallback(): ?string
    {
        return $this->name;
    }

    /**
     * Get SEO description fallback.
     */
    public function getSeoDescriptionFallback(): ?string
    {
        return strip_tags($this->content) ? mb_substr(strip_tags($this->content), 0, 160) : null;
    }

    /**
     * Get SEO image fallback.
     */
    public function getSeoImageFallback(): ?string
    {
        return $this->right_ad_image;
    }
}
