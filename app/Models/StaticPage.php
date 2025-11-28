<?php

namespace App\Models;

use App\Traits\HasSeo;
use App\Traits\HasSchemaMarkup;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasSeo, HasSchemaMarkup;

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

    /**
     * Get breadcrumbs for the page.
     */
    protected function getBreadcrumbs(): array
    {
        return [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => $this->getSeoTitleFallback(), 'url' => url($this->route_name)],
        ];
    }
}
