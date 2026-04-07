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
                    ->required(),
                TextInput::make('attachable_id')
                    ->required()
                    ->numeric(),
                TextInput::make('file_path')
                    ->required(),
                TextInput::make('original_name')
                    ->required(),
                TextInput::make('mime_type'),
                TextInput::make('size')
                    ->numeric(),
                TextInput::make('uploaded_by')
                    ->numeric(),
            ]);
    }
}
