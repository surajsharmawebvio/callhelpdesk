<?php

namespace App\Models;

use App\Traits\HasSeo;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasSeo;

    protected $fillable = [
        'route_name',
        'title',
        'content',
        'published',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    /**
     * Get SEO title fallback.
     */
    public function getSeoTitleFallback(): ?string
    {
        return $this->title;
    }

    /**
     * Get SEO description fallback.
     */
    public function getSeoDescriptionFallback(): ?string
    {
        return strip_tags($this->content) ? mb_substr(strip_tags($this->content), 0, 160) : null;
    }
}
