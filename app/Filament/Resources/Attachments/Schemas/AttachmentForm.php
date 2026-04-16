<?php
namespace App\Filament\Resources\Attachments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AttachmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('attachable_type')
                    ->label(__('filament-panels::resources.attachments.columns.attachable_type'))
                    ->required(),
                TextInput::make('attachable_id')
                    ->label(__('filament-panels::resources.attachments.columns.attachable_id'))
                    ->required()
                    ->numeric(),
                TextInput::make('file_path')
                    ->label(__('filament-panels::resources.attachments.columns.file_path'))
                    ->required(),
                TextInput::make('original_name')
                    ->label(__('filament-panels::resources.attachments.columns.original_name'))
                    ->required(),
                TextInput::make('mime_type')
                    ->label(__('filament-panels::resources.attachments.columns.mime_type')),
                TextInput::make('size')
                    ->label(__('filament-panels::resources.attachments.columns.size'))
                    ->numeric(),
                TextInput::make('uploaded_by')
                    ->label(__('filament-panels::resources.attachments.columns.uploaded_by'))
                    ->numeric(),
            ]);
    }
}
