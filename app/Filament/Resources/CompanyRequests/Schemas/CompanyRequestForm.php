<?php

namespace App\Filament\Resources\CompanyRequests\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CompanyRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('business_name')
                    ->required()
                    ->maxLength(255)
                    ->label('Business Name'),
                
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->label('Email'),
                
                TextInput::make('website')
                    ->url()
                    ->maxLength(255)
                    ->label('Website'),
                
                TextInput::make('category')
                    ->maxLength(255)
                    ->label('Category'),
                
                Textarea::make('address')
                    ->rows(3)
                    ->label('Address'),
                
                TextInput::make('country_code')
                    ->required()
                    ->maxLength(10)
                    ->label('Country Code'),
                
                TextInput::make('country_name')
                    ->required()
                    ->maxLength(100)
                    ->label('Country Name'),
                
                TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(50)
                    ->label('Phone'),
                
                Textarea::make('description')
                    ->rows(5)
                    ->columnSpanFull()
                    ->label('Description'),
                
                FileUpload::make('document_path')
                    ->directory('company-documents')
                    ->visibility('public')
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                    ->maxSize(5120)
                    ->columnSpanFull()
                    ->label('Document'),
                
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->default('pending')
                    ->required()
                    ->label('Status'),
                
                Textarea::make('admin_notes')
                    ->rows(3)
                    ->columnSpanFull()
                    ->label('Admin Notes'),
            ])
            ->columns(2);
    }
}
