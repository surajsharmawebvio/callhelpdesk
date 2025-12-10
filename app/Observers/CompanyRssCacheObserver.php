<?php

namespace App\Observers;

use App\Models\Company;
use Illuminate\Support\Facades\Cache;

class CompanyRssCacheObserver
{
    /**
     * Handle the Company "created" event.
     */
    public function created(Company $company): void
    {
        $this->clearRssCache($company);
    }

    /**
     * Handle the Company "updated" event.
     */
    public function updated(Company $company): void
    {
        $this->clearRssCache($company);
    }

    /**
     * Handle the Company "deleted" event.
     */
    public function deleted(Company $company): void
    {
        $this->clearRssCache($company);
    }

    /**
     * Clear relevant RSS feed caches.
     */
    private function clearRssCache(Company $company): void
    {
        // Clear main companies feed
        Cache::forget('rss_feed_companies');

        // Clear category feed if company has a category
        if ($company->company_category_id) {
            Cache::forget("rss_feed_category_{$company->company_category_id}");
        }

        // Clear individual company feed
        Cache::forget("rss_feed_company_{$company->id}");

        // Log cache clearing for debugging
        \Log::info("RSS cache cleared for company: {$company->name} (ID: {$company->id})");
    }
}
