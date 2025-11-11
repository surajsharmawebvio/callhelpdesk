<?php

namespace App\Filament\Resources\ManageCompanies;

use App\Filament\Resources\ManageCompanies\Pages\{ 
    CreateManageCompany, 
    EditManageCompany, 
    ListManageCompanies 
};
use App\Filament\Resources\ManageCompanies\Tables\ManageCompaniesTable;
use App\Models\Company;
use App\Models\CompanyQuestion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\{TextInput, RichEditor, Repeater, Textarea};

class ManageCompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->schema([
                Section::make('Company Details')
                    ->schema([
                        TextInput::make('name')
                            ->label('Company Name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('phone')
                            ->label('Phone Number')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('url')
                            ->label('URL')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('ulpad')
                            ->label('ULPAD')
                            ->maxLength(255),

                        TextInput::make('ad_id')
                            ->label('Ad ID')
                            ->numeric()
                            ->default(0),

                        TextInput::make('popup_id')
                            ->label('Popup ID')
                            ->numeric()
                            ->default(0),

                        RichEditor::make('content')
                            ->label('Content')
                            ->required()
                            ->columnSpanFull(),
                    ])->collapsed(),

                Section::make('Company Questions')
                    ->schema([
                        Repeater::make('questions')
                            ->relationship('questions')
                            ->schema([
                                TextInput::make('question')
                                    ->label('Question')
                                    ->required()
                                    ->columnSpanFull(),

                                Textarea::make('answer')
                                    ->label('Answer')
                                    ->required()
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ])
                            ->label('Frequently Asked Questions')
                            ->collapsible()
                            ->defaultItems(0)
                            ->addActionLabel('Add Question'),
                    ])->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return ManageCompaniesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListManageCompanies::route('/'),
            'create' => CreateManageCompany::route('/create'),
            'edit' => EditManageCompany::route('/{record}/edit'),
        ];
    }
}
