<?php
namespace App\Filament\Resources\Departments\RelationManagers;

use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';

    protected static ?string $recordTitleAttribute = 'full_name_with_initials';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('surname')
                    ->label('Фамилия')
                    ->required(),
                TextInput::make('name')
                    ->label('Имя')
                    ->required(),
                TextInput::make('patronymic')
                    ->label('Отчество'),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('filament-panels::resources.departments.users.label'))
            ->emptyStateHeading(__('filament-panels::resources.departments.users.empty'))
            ->columns([
                TextColumn::make('full_name_with_initials')
                    ->label(__('filament-panels::resources.departments.users.columns.full_name'))
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('filament-panels::resources.departments.users.columns.email'))
                    ->searchable(),
                TextColumn::make('phone')
                    ->label(__('filament-panels::resources.departments.users.columns.phone')),
                TextColumn::make('position.name')
                    ->label(__('filament-panels::resources.departments.users.columns.position')),
            ])
            ->actions([
                ViewAction::make()
                    ->url(fn($record) => route('filament.admin.resources.users.view', $record)),
                EditAction::make()
                    ->url(fn($record) => route('filament.admin.resources.users.edit', $record)),
            ]);
    }
}
