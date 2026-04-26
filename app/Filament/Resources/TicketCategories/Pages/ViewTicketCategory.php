<?php
namespace App\Filament\Resources\Departments\Pages;

use App\Filament\Resources\TicketCategories\TicketCategoryResource;
use Filament\Actions;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ViewTicketCategory extends ViewRecord
{
    protected static string $resource = TicketCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make()
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('name')
                            ->label(__('filament-panels::resources.ticket-categories.columns.name'))
                            ->placeholder('—'),
                        TextEntry::make('slug')
                            ->label(__('filament-panels::resources.ticket-categories.columns.slug'))
                            ->placeholder('—'),
                        TextEntry::make('description')
                            ->label(__('filament-panels::resources.ticket-categories.columns.description'))
                            ->placeholder('—')
                            ->columnSpanFull(),
                        TextEntry::make('created_at')
                            ->label(__('filament-panels::resources.ticket-categories.columns.created_at'))
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                        TextEntry::make('updated_at')
                            ->label(__('filament-panels::resources.ticket-categories.columns.updated_at'))
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                    ]),
            ]);
    }
}
