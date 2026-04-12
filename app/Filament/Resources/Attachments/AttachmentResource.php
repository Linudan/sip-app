<?php

namespace App\Filament\Resources\Attachments;

use App\Filament\Resources\Attachments\Pages\CreateAttachment;
use App\Filament\Resources\Attachments\Pages\EditAttachment;
use App\Filament\Resources\Attachments\Pages\ListAttachments;
use App\Filament\Resources\Attachments\Schemas\AttachmentForm;
use App\Filament\Resources\Attachments\Tables\AttachmentsTable;
use App\Models\Attachment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AttachmentResource extends Resource
{
    protected static ?string $model = Attachment::class;

    // Сортировка
    protected static ?int $navigationSort = 4;

    // Динамическая надпись
    public static function getNavigationLabel(): string {

    return __('filament-panels::resources.attachments.navigation_label');
    }

    // Статическая надпись
    // protected static ?string $navigationLabel = 'Вложения';

    // Иконка
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Link;

    // Динамическая надпись
    public static function getNavigationGroup(): ?string {
    return __('filament-panels::resources.groups.other_group_label');
    }

    public static function form(Schema $schema): Schema
    {
        return AttachmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AttachmentsTable::configure($table);
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
            'index' => ListAttachments::route('/'),
            'create' => CreateAttachment::route('/create'),
            'edit' => EditAttachment::route('/{record}/edit'),
        ];
    }
}
