<?php

namespace Webvio\FilamentLinkNofollow\Console\Commands;

use Illuminate\Console\Command;

class BuildAssetsCommand extends Command
{
    protected $signature = 'filament-link-nofollow:build';

    protected $description = 'Build the Filament Link Nofollow JavaScript assets';

    public function handle(): int
    {
        $this->info('Building Filament Link Nofollow assets...');

        $packagePath = dirname(__DIR__, 3);
        $buildScript = $packagePath . '/bin/build.js';

        if (!file_exists($buildScript)) {
            $this->error('Build script not found at: ' . $buildScript);
            return self::FAILURE;
        }

        // Check if node is available
        exec('node --version', $output, $returnVar);
        if ($returnVar !== 0) {
            $this->error('Node.js is not installed or not in PATH.');
            return self::FAILURE;
        }

        // Run the build script
        $this->info('Running build script...');
        exec("node \"{$buildScript}\"", $output, $returnVar);

        if ($returnVar !== 0) {
            $this->error('Build failed. Please check the error messages above.');
            return self::FAILURE;
        }

        $this->info('Assets built successfully!');
        $this->newLine();
        $this->info('Next steps:');
        $this->line('1. Run: php artisan filament:assets');
        $this->line('2. Clear cache: php artisan optimize:clear');

        return self::SUCCESS;
    }
}
