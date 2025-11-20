# Filament Link Nofollow - Quick Reference

## Package Structure

```
packages/filament-link-nofollow/
├── bin/
│   └── build.js                    # esbuild configuration
├── config/
│   └── filament-link-nofollow.php  # Package configuration
├── resources/
│   ├── js/
│   │   └── custom-link.js          # TipTap Link extension source
│   └── dist/
│       └── custom-link.js          # Compiled JavaScript
├── src/
│   ├── Console/
│   │   └── Commands/
│   │       └── BuildAssetsCommand.php
│   ├── Plugins/
│   │   └── CustomLinkPlugin.php    # Main plugin class
│   └── FilamentLinkNofollowServiceProvider.php
├── composer.json
├── package.json
├── README.md
├── INSTALLATION.md
├── CONTRIBUTING.md
├── CHANGELOG.md
└── LICENSE.md
```

## Installation Commands

### For Local Development (current setup)

```bash
# 1. Package is already in composer.json repositories
# 2. Install package
composer update webvio/filament-link-nofollow

# 3. Install JavaScript dependencies
cd packages/filament-link-nofollow
npm install

# 4. Build assets
npm run build

# 5. Return to project root
cd ../..

# 6. Publish Filament assets
php artisan filament:assets

# 7. Clear cache
php artisan optimize:clear
```

### For Production (via Packagist - when published)

```bash
# 1. Install package
composer require webvio/filament-link-nofollow

# 2. Build assets (package command)
php artisan filament-link-nofollow:build

# 3. Publish Filament assets
php artisan filament:assets

# 4. Clear cache
php artisan optimize:clear
```

## Usage in Code

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

## Features

- ✅ Dofollow/Nofollow checkbox
- ✅ Target selection (same/new tab)
- ✅ Automatic rel attribute management
- ✅ Edit existing links

## Publishing to GitHub/Packagist

### 1. Create GitHub Repository

```bash
cd packages/filament-link-nofollow
git init
git add .
git commit -m "Initial commit"
git remote add origin https://github.com/yourusername/filament-link-nofollow.git
git push -u origin main
```

### 2. Submit to Packagist

1. Go to https://packagist.org/packages/submit
2. Enter repository URL: `https://github.com/yourusername/filament-link-nofollow`
3. Click "Check"
4. Follow submission process

### 3. Update Installation in README

After publishing, users can install via:

```bash
composer require webvio/filament-link-nofollow
```

## Development Workflow

### Making Changes to JavaScript

1. Edit `resources/js/custom-link.js`
2. Build: `npm run build`
3. Publish: `php artisan filament:assets` (from project root)
4. Clear cache: `php artisan optimize:clear`

### Making Changes to PHP

1. Edit files in `src/`
2. Clear cache: `composer dump-autoload && php artisan optimize:clear`

### Version Updates

1. Update version in `composer.json` and `package.json`
2. Update `CHANGELOG.md`
3. Commit and tag:
   ```bash
   git commit -am "Release v1.1.0"
   git tag v1.1.0
   git push && git push --tags
   ```

## Troubleshooting

### Assets not loading
```bash
php artisan filament-link-nofollow:build
php artisan filament:assets
php artisan optimize:clear
```

### Package not found
```bash
composer dump-autoload
composer update webvio/filament-link-nofollow
```

### JavaScript changes not reflecting
```bash
cd packages/filament-link-nofollow
npm run build
cd ../..
php artisan filament:assets
```
