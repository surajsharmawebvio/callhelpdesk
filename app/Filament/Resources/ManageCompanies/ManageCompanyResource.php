<?php

namespace App\Filament\Resources\ManageCompanies;

use App\Filament\Forms\Components\SeoForm;
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
use Filament\Forms\Components\{TextInput, RichEditor, Repeater, Textarea, Toggle, FileUpload, Select};
use App\Forms\Components\CustomRichEditor;
use App\Models\CompanyCategory;
use Webvio\FilamentLinkNofollow\Plugins\CustomLinkPlugin;

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

                        Select::make('company_category_id')
                            ->label('Category')
                            ->options(CompanyCategory::pluck('name', 'id'))
                            ->searchable()
                            ->placeholder('Select a category')
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->label('Category Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(CompanyCategory::class, 'name'),

                                // TextInput::make('slug')
                                //     ->label('Slug')
                                //     ->required()
                                //     ->maxLength(255)
                                //     ->unique(CompanyCategory::class, 'slug'),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->maxLength(1000)
                                    ->rows(3),
                            ])
                            ->createOptionUsing(function (array $data) {
                                return CompanyCategory::create($data)->id;
                            }),

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

                        Toggle::make('published')
                            ->label('Published')
                            ->default(false)
                            ->helperText('Toggle to publish or unpublish this company')
                            ->afterStateUpdated(function ($state, $record) {
                                $record->touch(); // Updates the updated_at timestamp
                            }),

                        CustomRichEditor::make('content')
                            ->label('Content')
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
                    ])->collapsed(),

                Section::make('FAQs')
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

                Section::make('Right Ads')
                ->schema([
                    // make upload image component for right ads
                    FileUpload::make('right_ad_image')
                        ->label('Right Ad Image')
                        ->disk('public')
                        ->directory('company-ads')
                        ->image()
                        ->nullable(),
                ])
                ->collapsed(),

                // SEO Settings
                SeoForm::make(),

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
