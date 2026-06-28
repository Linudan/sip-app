<?php
namespace App\Filament\Resources\Tickets\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TicketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('ticket_number')
                    ->disabled()
                    ->label(__('filament-panels::resources.tikets.placeholder.ticket_number'))
                    ->helperText('Генерируется автоматически'),
                Select::make('user_id')
                    ->label(__('filament-panels::resources.tikets.placeholder.user_name'))
                    ->options(function () {
                        return \App\Models\User::all()
                            ->mapWithKeys(fn($user) => [$user->id => $user->full_name_with_initials])
                            ->toArray();
                    })
                    ->searchable()
                    ->required(),
                Select::make('category_id')
                    ->label(__('filament-panels::resources.tikets.placeholder.category_name'))
                    ->relationship('category', 'name')
                    ->required(),
                Select::make('equipment_item_id')
                    ->label(__('filament-panels::resources.tikets.placeholder.equipment_item_name'))
                    ->searchable()
                    ->preload()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        // При изменении оборудования обновляем значение инвентарного номера
                        if ($state) {
                            $equipment = \App\Models\EquipmentItem::find($state);
                            $set('equipment_inventory_number', $equipment ? $equipment->inventory_number : '—');
                        } else {
                            $set('equipment_inventory_number', '—');
                        }
                    })
                    ->relationship('equipmentItem', 'name'),

                TextInput::make('equipment_inventory_number')
                    ->label(__('filament-panels::resources.equipments.columns.inventory_number'))
                    ->disabled()
                    ->placeholder('—')
                    ->dehydrated(false) 
                    ->default('—'),
                TextInput::make('title')
                    ->label(__('filament-panels::resources.tikets.placeholder.title'))
                    ->required(),
                SpatieMediaLibraryFileUpload::make('attachments')
                // Создание коллекции
                    ->collection('tickets_attachments')
                    ->disk('public')
                // Загрузка нескольких файлов одновременно
                    ->multiple()
                // Загрузка только изображений
                // ->image()
                // Возможность скачать
                    ->downloadable()
                // Возможность открыть
                    ->openable()
                // Возможность изменения порядка файлов
                    ->reorderable()
                // Создание нескольких разделов
                    ->responsiveImages()
                    ->maxFiles(10)   // максимальное количество файлов
                    ->maxSize(10240) // 10 MB
                    ->acceptedFileTypes([
                        // Изображения
                        'image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/svg+xml', 'image/bmp',
                        // Документы
                        'application/pdf',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                        'application/vnd.ms-powerpoint',
                        'application/vnd.openxmlformats-officedocument.presentationml.presentation', // .pptx
                        'text/plain',                                                                // для .txt, .md (если не отдельно)
                        'application/rtf',
                        'application/vnd.oasis.opendocument.text',         // .odt
                        'application/vnd.oasis.opendocument.spreadsheet',  // .ods
                        'application/vnd.oasis.opendocument.presentation', // .odp
                                                                           // Markdown (если хотите явно)
                        'text/markdown', 'text/x-markdown',
                    ])
                    ->helperText('Разрешённые форматы: изображения, документы (PDF, DOC, XLS, PPT, TXT, RTF, ODT, ODS, ODP) и Markdown. Макс. размер 10 МБ.'),
                Textarea::make('description')
                    ->label(__('filament-panels::resources.tikets.placeholder.description'))
                    ->columnSpanFull(),
                Select::make('priority')
                    ->label(__('filament-panels::resources.tikets.placeholder.priority'))
                    ->required()
                    ->options([
                        'low'      => __('filament-panels::resources.tikets.enums.priority.low'),
                        'medium'   => __('filament-panels::resources.tikets.enums.priority.medium'),
                        'high'     => __('filament-panels::resources.tikets.enums.priority.high'),
                        'critical' => __('filament-panels::resources.tikets.enums.priority.critical'),
                    ])
                    ->default('medium'),
                Select::make('status')
                    ->label(__('filament-panels::resources.tikets.placeholder.status'))
                    ->required()
                    ->options(function ($record, $livewire) {
                        $user          = auth()->user();
                        $isCreate      = $livewire instanceof \Filament\Resources\Pages\CreateRecord;
                        $currentStatus = $record ? $record->status : null;

                        $allStatuses = [
                            'new'         => __('filament-panels::resources.tikets.enums.status.new'),
                            'in_progress' => __('filament-panels::resources.tikets.enums.status.in_progress'),
                            'pending'     => __('filament-panels::resources.tikets.enums.status.pending'),
                            'resolved'    => __('filament-panels::resources.tikets.enums.status.resolved'),
                            'closed'      => __('filament-panels::resources.tikets.enums.status.closed'),
                            'cancelled'   => __('filament-panels::resources.tikets.enums.status.cancelled'),
                        ];

                        // Определяем доступные статусы для ролей
                        if ($user->hasRole(['admin', 'it_specialist'])) {
                            if ($isCreate) {
                                // При создании админ/IT может выбрать только начальные статусы
                                $allowed = ['new', 'in_progress', 'pending'];
                            } else {
                                // При редактировании разрешаем только рабочие статусы (не финальные)
                                $allowed = ['in_progress', 'pending', 'resolved'];
                                // Если текущий статус 'new', то разрешаем его тоже (чтобы можно было оставить)
                                if ($currentStatus === 'new') {
                                    $allowed[] = 'new';
                                }
                                // Если текущий статус уже 'resolved', то можно вернуть обратно в работу
                                // (это не запрещено, так как 'resolved' уже в списке)
                            }
                        } else {
                            // Для обычных пользователей поле скрыто (см. visible ниже)
                            $allowed = [];
                        }

                        return array_intersect_key($allStatuses, array_flip($allowed));
                    })
                    ->default('new')
                    ->visible(fn($livewire) => auth()->user()->hasRole(['admin', 'it_specialist']))
                    ->afterStateUpdated(function ($state, callable $set, $record) {
                        // Если статус меняется на 'resolved', автоматически проставляем resolved_at
                        if ($state === 'resolved' && $record && ! $record->resolved_at) {
                            $set('resolved_at', now());
                        }
                        // Если статус меняется на 'closed' или 'cancelled', можно проставить соответствующие даты,
                        // но эти статусы мы не даём выбирать админу, поэтому здесь не нужно.
                    }),
                DateTimePicker::make('resolved_at')
                    ->disabled()
                    ->label(__('filament-panels::resources.tikets.placeholder.resolved_at')),
                DateTimePicker::make('closed_at')
                    ->label(__('filament-panels::resources.tikets.placeholder.closed_at')),
                TextInput::make('user_rating')
                    ->label(__('filament-panels::resources.tikets.placeholder.user_rating'))
                    ->numeric(),
                Textarea::make('user_feedback')
                    ->label(__('filament-panels::resources.tikets.placeholder.user_feedback'))
                    ->columnSpanFull(),
            ]);
    }
}
