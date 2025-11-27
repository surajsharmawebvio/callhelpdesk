<?php

namespace App\Filament\Resources\StaticPages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class StaticPagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('route_name')
                    ->label('Page')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn (string $state): string => ucwords(str_replace('-', ' ', $state)))
                    ->badge()
                    ->color('primary'),

                TextColumn::make('seo.meta_title')
                    ->label('Meta Title')
                    ->limit(50)
                    ->placeholder('Not set')
                    ->tooltip(fn ($record) => $record->seo?->meta_title),

                TextColumn::make('seo.meta_description')
                    ->label('Meta Description')
                    ->limit(60)
                    ->placeholder('Not set')
                    ->tooltip(fn ($record) => $record->seo?->meta_description)
                    ->wrap(),

                IconColumn::make('published')
                    ->label('Published')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('M d, Y H:i')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('route_name');
    }
}
