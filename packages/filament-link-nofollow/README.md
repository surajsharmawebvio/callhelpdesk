# Filament Link Nofollow

A Filament plugin that adds a dofollow/nofollow checkbox to the RichEditor link modal, giving you better SEO control over your links.

![Filament Link Nofollow](https://via.placeholder.com/800x400?text=Filament+Link+Nofollow)

## Features

- ✅ **Dofollow/Nofollow Checkbox** - Easily control link SEO attributes
- ✅ **Target Control** - Choose between same tab or new tab
- ✅ **Automatic Rel Attributes** - Intelligently adds `noopener noreferrer` for new tabs
- ✅ **Edit Existing Links** - Modal pre-fills with current link values
- ✅ **Seamless Integration** - Works with any Filament RichEditor

## Requirements

- PHP 8.1 or higher
- Laravel 11.0 or higher
- Filament 4.0 or higher
- Node.js and NPM (for building assets)

## Installation

### Step 1: Install the package via Composer

```bash
composer require webvio/filament-link-nofollow
```

### Step 2: Install NPM dependencies

```bash
npm install @tiptap/extension-link --save-dev
```

### Step 3: Build the JavaScript assets

The package needs to compile the custom TipTap Link extension. Run:

```bash
php artisan filament-link-nofollow:build
```

This will compile the JavaScript file to your public directory.

### Step 4: Publish assets

```bash
php artisan filament:assets
```

## Usage

### Basic Usage

Simply add the `CustomLinkPlugin` to your RichEditor:

```php
use Filament\Forms\Components\RichEditor;
use Webvio\FilamentLinkNofollow\Plugins\CustomLinkPlugin;

RichEditor::make('content')
    ->toolbarButtons([
        ['bold', 'italic', 'underline', 'strike', 'link'],
        ['h2', 'h3', 'bulletList', 'orderedList'],
        ['undo', 'redo'],
    ])
    ->plugins([
        CustomLinkPlugin::make(),
    ])
```

### Complete Example

```php
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Webvio\FilamentLinkNofollow\Plugins\CustomLinkPlugin;

Section::make('Content')
    ->schema([
        RichEditor::make('content')
            ->label('Article Content')
            ->required()
            ->toolbarButtons([
                ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                ['table', 'attachFiles'],
                ['undo', 'redo'],
            ])
            ->plugins([
                CustomLinkPlugin::make(),
            ])
            ->columnSpanFull(),
    ])
```

## How It Works

When users click the **Link** button in the RichEditor toolbar, a modal opens with:

1. **URL Field** - Required input for the link destination
2. **Open In Dropdown** - Choose "Same tab" or "New tab"
3. **Add nofollow attribute Checkbox** - Control SEO link behavior

The plugin automatically manages the `rel` attribute:
- **New tab selected**: Adds `rel="noopener noreferrer"`
- **Nofollow checked**: Adds `nofollow` to the rel attribute
- **Both**: `rel="noopener noreferrer nofollow"`

## Configuration

### Customizing the Modal

You can extend the plugin to customize the modal appearance or add additional fields:

```php
use Webvio\FilamentLinkNofollow\Plugins\CustomLinkPlugin;

CustomLinkPlugin::make()
    // Plugin is ready to use out of the box
```

## Development

### Building from Source

If you want to modify the JavaScript extension:

1. Clone the repository
2. Install dependencies: `npm install`
3. Modify `resources/js/custom-link.js`
4. Build: `npm run build`
5. Publish assets: `php artisan filament:assets`

### Build Script

The package includes a build script at `bin/build.js` that uses esbuild to compile the TipTap extension.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security-related issues, please email info@webvio.com instead of using the issue tracker.

## Credits

- [WebVio](https://github.com/webvio)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Support

For support, please open an issue on GitHub or contact us at info@webvio.com.

## Screenshots

### Link Modal with Nofollow Checkbox
![Link Modal](https://via.placeholder.com/600x400?text=Link+Modal+Screenshot)

### Usage in Filament Resource
![Usage Example](https://via.placeholder.com/600x400?text=Usage+Example)
