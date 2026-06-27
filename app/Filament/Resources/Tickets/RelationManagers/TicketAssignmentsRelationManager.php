<?php
namespace App\Filament\Resources\Tickets\RelationManagers;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TicketAssignmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'assignedUsers';

    protected static ?string $recordTitleAttribute = 'full_name_with_initials';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Select::make('user_id')
                    ->label(__('filament-panels::resources.tikets.assignments.singular'))
                    ->options(
                        User::whereHas('department', function ($query) {
                            $query->where('dep_name', 'Отдел информатизации');
                        })->get()->mapWithKeys(fn($user) => [$user->id => $user->full_name_with_initials])
                    )
                    ->required()
                    ->searchable(),
                Toggle::make('is_primary')
                    ->label(__('filament-panels::resources.tikets.assignments.primary'))
                    ->default(false),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('filament-panels::resources.tikets.assignments.label'))
            ->emptyStateHeading(__('filament-panels::resources.tikets.assignments.empty'))
            ->paginated(false)
            ->columns([
                TextColumn::make('full_name_with_initials')
                    ->label(__('filament-panels::resources.tikets.assignments.singular'))
                    ->searchable(),
                IconColumn::make('pivot.is_primary')
                    ->label(__('filament-panels::resources.tikets.assignments.primary'))
                    ->boolean(),
                TextColumn::make('pivot.assigned_at')
                    ->label(__('filament-panels::resources.tikets.assignments.assigned_at'))
                    ->dateTime('d.m.Y H:i'),
            ])
            ->headerActions([
                Action::make('attach')
                    ->label(__('filament-panels::resources.tikets.assignments.add_action'))
                    ->icon('heroicon-o-user-plus')
                    ->form([
                        Select::make('user_id')
                            ->label(__('filament-panels::resources.tikets.assignments.singular'))
                            ->options(
                                User::whereHas('department', function ($query) {
                                    $query->where('dep_name', 'Отдел информатизации');
                                })->get()->mapWithKeys(fn($user) => [$user->id => $user->full_name_with_initials])
                            )
                            ->required()
                            ->searchable(),
                        Toggle::make('is_primary')
                            ->label(__('filament-panels::resources.tikets.assignments.primary'))
                            ->default(false),
                    ])
                    ->action(function (array $data, $livewire): void {
                        $ticket = $livewire->getOwnerRecord();

                        if ($ticket->assignedUsers()->where('user_id', $data['user_id'])->exists()) {
                            Notification::make()
                                ->title(__('filament-panels::resources.tikets.assignments.already_assigned'))
                                ->danger()
                                ->send();
                            return;
                        }

                        $ticket->assignedUsers()->attach($data['user_id'], [
                            'assigned_at' => now(),
                            'is_primary'  => $data['is_primary'],
                        ]);

                        Notification::make()
                            ->title(__('filament-panels::resources.tikets.assignments.added_success'))
                            ->success()
                            ->send();
                    }),
            ])
            ->actions([
                EditAction::make()
                    ->form([
                        Toggle::make('is_primary')
                            ->label(__('filament-panels::resources.tikets.assignments.primary')),
                    ])
                    ->using(function ($record, array $data) {
                        $record->pivot->update([
                            'is_primary' => $data['is_primary'],
                        ]);
                        return $record;
                    }),
                DeleteAction::make()
                    ->action(function ($record) {
                        $record->pivot->delete();
                    }),
            ])
            ->bulkActions([
                DeleteBulkAction::make()
                    ->action(function ($records) {
                        foreach ($records as $record) {
                            $record->pivot->delete();
                        }
                    }),
            ]);
    }
}
