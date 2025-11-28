<?php

namespace Database\Seeders;

use App\Models\StaticPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaticPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            ['route_name' => 'home', 'published' => true],
            ['route_name' => 'about-us', 'published' => true],
            ['route_name' => 'contact-us', 'published' => true],
            ['route_name' => 'privacy-policy', 'published' => true],
            ['route_name' => 'terms-and-conditions', 'published' => true],
            ['route_name' => 'disclaimer', 'published' => true],
            ['route_name' => 'sitemap', 'published' => true],
        ];

        foreach ($pages as $page) {
            StaticPage::firstOrCreate(
                ['route_name' => $page['route_name']],
                $page
            );
        }
    }
}
