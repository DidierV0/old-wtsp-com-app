<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Listes;
use App\Models\Contact;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ListesResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ListesResource\RelationManagers;

class ListesResource extends Resource
{
    protected static ?string $model = Listes::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            //     Forms\Components\TextInput::make('nom_liste')
            //         ->label('Nom')
            //         ->required(),
            //     Forms\Components\TextInput::make('description')->required(),
            //     Forms\Components\Hidden::make('user_id')
            //         ->dehydrateStateUsing(fn ($state) => auth()->user()->id),
            
            Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema(static::getFormSchema())
                            ->columns(2),

                        Forms\Components\Section::make('Contact items')
                            ->schema(static::getFormSchema('contact')),
                    ])
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom_liste')
                    ->label('Nom'),
                Tables\Columns\TextColumn::make('description'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListListes::route('/'),
            'create' => Pages\CreateListes::route('/create'),
            'edit' => Pages\EditListes::route('/{record}/edit'),
        ];
    }

    public static function getFormSchema(string $section = null): array
    {
        if ($section === 'contact') {
            return [
                Forms\Components\Repeater::make('items')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('listes_id')
                            ->label('Contact')
                            ->options(Contact::query()->pluck('nom', 'id'))
                            ->required()
                            ->reactive()
                            // ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('unit_price', Product::find($state)?->price ?? 0))
                            ->columnSpan([
                                'md' => 5,
                            ])
                            ->searchable(),

                //         Forms\Components\TextInput::make('qty')
                //             ->label('Quantity')
                //             ->numeric()
                //             ->default(1)
                //             ->columnSpan([
                //                 'md' => 2,
                //             ])
                //             ->required(),

                //         Forms\Components\TextInput::make('unit_price')
                //             ->label('Unit Price')
                //             ->disabled()
                //             ->dehydrated()
                //             ->numeric()
                //             ->required()
                //             ->columnSpan([
                //                 'md' => 3,
                //             ]),
                    ])
                    // ->orderable()
                    // ->defaultItems(1)
                    ->disableLabel()
                    ->columns([
                        'md' => 10,
                    ])
                //     ->required(),
                // Forms\Components\TextInput::make('nom_liste')
                //     ->label('contact')
                //     ->required(),
                // Forms\Components\TextInput::make('description')->required(),
                // Forms\Components\Hidden::make('user_id')
                    // ->dehydrateStateUsing(fn ($state) => auth()->user()->id),
            
            ];
        }

        return [
            Forms\Components\TextInput::make('nom_liste')
                    ->label('Nom')
                    ->required(),
                Forms\Components\TextInput::make('description')->required(),
                Forms\Components\Hidden::make('user_id')
                    ->dehydrateStateUsing(fn ($state) => auth()->user()->id),
            
        ];
    }
}
