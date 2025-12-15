<?php

namespace App\Filament\Resources\CompanyRequests\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\Action;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

class CompanyRequestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('business_name')
                    ->searchable()
                    ->sortable()
                    ->label('Business Name'),
                
                TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->label('Email')
                    ->copyable(),
                
                TextColumn::make('phone')
                    ->searchable()
                    ->label('Phone')
                    ->copyable(),
                
                TextColumn::make('country_name')
                    ->searchable()
                    ->sortable()
                    ->label('Country'),
                
                TextColumn::make('category')
                    ->searchable()
                    ->sortable()
                    ->label('Category')
                    ->badge()
                    ->color('info'),
                
                BadgeColumn::make('status')
                    ->sortable()
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ])
                    ->icons([
                        'heroicon-o-clock' => 'pending',
                        'heroicon-o-check-circle' => 'approved',
                        'heroicon-o-x-circle' => 'rejected',
                    ]),
                
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Submitted')
                    ->since(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->label('Status'),
                
                SelectFilter::make('category')
                    ->options([
                        'technology' => 'Technology',
                        'healthcare' => 'Healthcare',
                        'finance' => 'Finance',
                        'retail' => 'Retail',
                        'food' => 'Food & Beverage',
                    ])
                    ->label('Category'),
            ])
            ->recordActions([
                Action::make('view')
                    ->label('View')
                    ->icon('heroicon-o-eye')
                    ->modalHeading('View Company Request')
                    ->modalSubmitActionLabel('Update Status & Notes')
                    ->modalCancelActionLabel('Close')
                    ->form([
                        TextInput::make('business_name')
                            ->label('Business Name')
                            ->disabled(),
                        
                        TextInput::make('email')
                            ->label('Email')
                            ->disabled(),
                        
                        TextInput::make('website')
                            ->label('Website')
                            ->disabled(),
                        
                        TextInput::make('category')
                            ->label('Category')
                            ->disabled(),
                        
                        Textarea::make('address')
                            ->label('Address')
                            ->disabled(),
                        
                        TextInput::make('country_code')
                            ->label('Country Code')
                            ->disabled(),
                        
                        TextInput::make('country_name')
                            ->label('Country Name')
                            ->disabled(),
                        
                        TextInput::make('phone')
                            ->label('Phone')
                            ->disabled(),
                        
                        Textarea::make('description')
                            ->label('Description')
                            ->disabled(),
                        
                        Placeholder::make('document')
                            ->label('Document')
                            ->content(function ($record) {
                                if ($record->document_path) {
                                    $fileName = basename($record->document_path);
                                    $downloadUrl = route('admin.download.document', ['id' => $record->id]);
                                    return new HtmlString(
                                        '<a href="' . $downloadUrl . '" target="_blank" class="text-primary-600 hover:text-primary-800 underline font-medium">' . 
                                        $fileName . ' <i class="heroicon-o-arrow-down-tray ml-1"></i></a>'
                                    );
                                }
                                return 'No document uploaded';
                            }),
                        
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Pending',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected',
                            ])
                            ->required(),
                        
                        Textarea::make('admin_notes')
                            ->label('Admin Notes')
                            ->rows(3),
                    ])
                    ->action(function (array $data, $record) {
                        $record->update([
                            'status' => $data['status'],
                            'admin_notes' => $data['admin_notes'],
                        ]);
                        
                        Notification::make()
                            ->title('Status and notes updated successfully')
                            ->success()
                            ->send();
                    })
                    ->fillForm(function ($record) {
                        return [
                            'business_name' => $record->business_name,
                            'email' => $record->email,
                            'website' => $record->website,
                            'category' => $record->category,
                            'address' => $record->address,
                            'country_code' => $record->country_code,
                            'country_name' => $record->country_name,
                            'phone' => $record->phone,
                            'description' => $record->description,
                            'document_path' => $record->document_path,
                            'status' => $record->status,
                            'admin_notes' => $record->admin_notes,
                        ];
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
