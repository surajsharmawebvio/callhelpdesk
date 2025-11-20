# Installation Guide

## Quick Start

### For Production Use (via Packagist - coming soon)

```bash
composer require webvio/filament-link-nofollow
```

### For Local Development

If you want to use this package locally in your Laravel project:

#### Step 1: Add to composer.json

Add the following to your project's `composer.json`:

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "./packages/filament-link-nofollow"
        }
    ],
    "require": {
        "webvio/filament-link-nofollow": "@dev"
    }
}
```

#### Step 2: Install the package

```bash
composer update webvio/filament-link-nofollow
```

#### Step 3: Install JavaScript dependencies

Navigate to the package directory and install:

```bash
cd packages/filament-link-nofollow
npm install
```

#### Step 4: Build assets

```bash
npm run build
```

Or use the Artisan command from your main project:

```bash
cd ../../
php artisan filament-link-nofollow:build
```

#### Step 5: Publish Filament assets

```bash
php artisan filament:assets
```

#### Step 6: Clear cache

```bash
php artisan optimize:clear
```

## Configuration

Optionally publish the configuration file:

```bash
php artisan vendor:publish --tag=filament-link-nofollow-config
```

This will create `config/filament-link-nofollow.php`.

## Usage

Use the plugin in your Filament resource:

```php
use Filament\Forms\Components\RichEditor;
use Webvio\FilamentLinkNofollow\Plugins\CustomLinkPlugin;

RichEditor::make('content')
    ->toolbarButtons([
        ['bold', 'italic', 'underline', 'strike', 'link'],
        ['h2', 'h3', 'bulletList', 'orderedList'],
    ])
    ->plugins([
        CustomLinkPlugin::make(),
    ])
```

## Troubleshooting

### Assets not loading

1. Make sure you've run `php artisan filament-link-nofollow:build`
2. Run `php artisan filament:assets`
3. Clear cache with `php artisan optimize:clear`
4. Check browser console for JavaScript errors

### NPM/Node.js not found

Make sure Node.js is installed and accessible in your PATH:

```bash
node --version
npm --version
```

### Package not found

If using local development:
1. Verify the path in repositories matches your structure
2. Run `composer dump-autoload`
3. Check that `@dev` version is specified

## Publishing to Packagist

To make this package available via Packagist:

1. Create a GitHub repository
2. Push your code
3. Submit to Packagist.org
4. Users can install via: `composer require webvio/filament-link-nofollow`
