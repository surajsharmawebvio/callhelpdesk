<?php

namespace Webvio\FilamentLinkNofollow\Plugins;

use Filament\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\EditorCommand;
use Filament\Forms\Components\RichEditor\Plugins\Contracts\RichContentPlugin;
use Filament\Forms\Components\RichEditor\RichEditorTool;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Support\Enums\Width;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Icons\Heroicon;
use Tiptap\Core\Extension;

class CustomLinkPlugin implements RichContentPlugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    /**
     * @return array<Extension>
     */
    public function getTipTapPhpExtensions(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    public function getTipTapJsExtensions(): array
    {
        return [
            FilamentAsset::getScriptSrc('filament-link-nofollow', 'webvio/filament-link-nofollow'),
        ];
    }

    /**
     * @return array<RichEditorTool>
     */
    public function getEditorTools(): array
    {
        return [
            RichEditorTool::make('link')
                ->action(arguments: '{ 
                    href: $getEditor().getAttributes(\'link\')?.href,
                    target: $getEditor().getAttributes(\'link\')?.target,
                    rel: $getEditor().getAttributes(\'link\')?.rel
                }')
                ->icon(Heroicon::Link),
        ];
    }

    /**
     * @return array<Action>
     */
    public function getEditorActions(): array
    {
        return [
            Action::make('link')
                ->modalWidth(Width::Large)
                ->modalHeading('Insert / Edit Link')
                ->fillForm(fn (array $arguments): array => [
                    'href' => $arguments['href'] ?? null,
                    'target' => $arguments['target'] ?? null,
                    'nofollow' => isset($arguments['rel']) && str_contains($arguments['rel'], 'nofollow'),
                ])
                ->schema([
                    TextInput::make('href')
                        ->label('URL')
                        ->required()
                        ->placeholder('https://example.com')
                        ->url(),
                    
                    Select::make('target')
                        ->label('Open in')
                        ->options([
                            '' => 'Same tab',
                            '_blank' => 'New tab',
                        ])
                        ->default(''),
                    
                    Checkbox::make('nofollow')
                        ->label('Add nofollow attribute')
                        ->helperText('Prevent search engines from following this link')
                        ->default(false),
                ])
                ->action(function (array $arguments, array $data, RichEditor $component): void {
                    // Build rel attribute based on target and nofollow
                    $rel = [];
                    
                    if ($data['target'] === '_blank') {
                        $rel[] = 'noopener';
                        $rel[] = 'noreferrer';
                    }
                    
                    if ($data['nofollow'] ?? false) {
                        $rel[] = 'nofollow';
                    }
                    
                    $relString = !empty($rel) ? implode(' ', $rel) : null;
                    
                    $component->runCommands(
                        [
                            EditorCommand::make(
                                'setLink',
                                arguments: [[
                                    'href' => $data['href'],
                                    'target' => $data['target'] ?: null,
                                    'rel' => $relString,
                                ]],
                            ),
                        ],
                        editorSelection: $arguments['editorSelection'],
                    );
                }),
        ];
    }
}
