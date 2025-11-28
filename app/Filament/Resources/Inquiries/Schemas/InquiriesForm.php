<?php

namespace App\Filament\Resources\Inquiries\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InquiriesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->label('First Name')
                    ->disabled(),
                TextInput::make('last_name')
                    ->label('Last Name')
                    ->disabled(),
                TextInput::make('email')
                    ->email()
                    ->disabled(),
                TextInput::make('phone')
                    ->label('Phone Number')
                    ->disabled(),
                TextInput::make('subject')
                    ->disabled(),
                Textarea::make('message')
                    ->label('Message')
                    ->rows(6)
                    ->disabled(),
            ]);
    }
}
