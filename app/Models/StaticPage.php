<?php

namespace App\Models;

use App\Traits\HasSeo;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasSeo;

    protected $fillable = [
        'route_name',
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
        return ucwords(str_replace('-', ' ', $this->route_name));
    }

    /**
     * Get SEO description fallback.
     */
    public function getSeoDescriptionFallback(): ?string
    {
        return 'Visit CallHelpDesk for ' . ucwords(str_replace('-', ' ', $this->route_name)) . ' information and customer service contact details.';
    }
}
