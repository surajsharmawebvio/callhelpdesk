# Project Context: CallHelpDesk

## Overview
This is a Laravel application serving as a "Call Help Desk" or similar system. It is built using the Laravel framework and heavily utilizes Filament for the administration panel and likely other resources.

## Tech Stack

### Backend
- **Framework**: Laravel 12.x
- **Language**: PHP 8.2+
- **Admin Panel**: Filament 4.0
- **Testing**: Pest PHP

### Frontend
- **Bundler**: Vite 7.x
- **CSS Frameworks**:
    - Tailwind CSS 4.x
    - Bootstrap 5.3
- **Scripting**: TypeScript

### Local Packages (Monorepo-like structure)
The project contains local packages located in the `packages/` directory, which are symlinked via Composer:
1.  `webvio/filament-link-nofollow` (`./packages/filament-link-nofollow`)
2.  `webvio/filament-seo` (`./packages/filament-seo`)
3.  `webvio/dynamic-sitemap` (`./packages/dynamic-sitemap`)

## Key Directories
- `app/Filament`: Contains Filament resources, pages, and widgets.
- `packages/`: Custom packages developed specifically for this project or for reuse.
- `resources/`: Frontend assets (views, inputs, js, css).

## Development Commands
- **Start Dev Server**: `npm run dev` (Vite)
- **Run Backend**: `php artisan serve`
- **Setup**: `composer setup` (Runs installation, migration, and build steps)
- **Formatting**: `npm run format` (Prettier)

## Conventions
- **Filament**: The project explicitly uses Filament 4.0. Ensure compatibility when generating resources or pages.
- **Styling**: Uses a mix of Tailwind and Bootstrap. Be mindful of potential conflicts, referencing `package.json` for specific versions.
- **SEO**: There is a heavy focus on SEO, evidenced by `SEO_IMPLEMENTATION.md` and the `filament-seo` package.

## Notes for AI Assistant
- When modifying Filament resources, check `app/Filament`.
- If asked to modify SEO logic or sitemap generation, check the respective packages in `packages/`.
- The project is configured as `laravel/blank-vue-starter-kit` originally but seems to be a custom build now.
