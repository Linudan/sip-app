<?php

namespace App\Livewire;

use Jeffgreco13\FilamentBreezy\Livewire\PersonalInfo;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Illuminate\Validation\Rule;

class MyPersonalInfo extends PersonalInfo
{
    public array $only = [
        'name', 'surname', 'patronymic', 'email',
        'phone', 'internal_phone', 'telegram_username', 'max_username',
    ];

    public function mount(): void
    {
        parent::mount();
        $this->user->load(['department', 'position']);
    }

    protected function getProfileFormSchema(): array
    {
        $fields = [];

        if ($this->hasAvatars) {
            $fields[] = filament('filament-breezy')->getAvatarUploadComponent();
        }

        $fields[] = Group::make([
            $this->getNameComponent(),
            $this->getSurnameComponent(),
            $this->getPatronymicComponent(),
            $this->getEmailComponent(),
            $this->getPhoneComponent(),
            $this->getInternalPhoneComponent(),
            $this->getTelegramUsernameComponent(),
            $this->getMaxUsernameComponent(),
        ])->columns(2)->columnSpanFull();

        $fields[] = Group::make([
            $this->getDepartmentComponent(),
            $this->getPositionComponent(),
        ])->columns(2)->columnSpanFull();

        return $fields;
    }

    protected function getNameComponent(): TextInput
    {
        return TextInput::make('name')->label('Имя')->required();
    }

    protected function getSurnameComponent(): TextInput
    {
        return TextInput::make('surname')->label('Фамилия');
    }

    protected function getPatronymicComponent(): TextInput
    {
        return TextInput::make('patronymic')->label('Отчество');
    }

    protected function getEmailComponent(): TextInput
    {
        return TextInput::make('email')
            ->label('E-mail')
            ->email()
            ->required()
            ->rules([
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user->id),
            ])
            ->validationMessages([
                'unique' => 'Пользователь с таким email уже существует.',
            ]);
    }

    protected function getPhoneComponent(): TextInput
    {
        return TextInput::make('phone')
            ->label('Телефон')
            ->tel()
            ->mask('+7 (999) 999-99-99')
            ->regex('/^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/')
            ->helperText('Формат: +7 (999) 999-99-99');
    }

    protected function getInternalPhoneComponent(): TextInput
    {
        return TextInput::make('internal_phone')
            ->label('Внутренний телефон')
            ->tel()
            ->mask('4599')
            ->regex('/^45\d{2}$/')
            ->helperText('Введите две последние цифры (первые две уже 45).');
    }

    protected function getTelegramUsernameComponent(): TextInput
    {
        return TextInput::make('telegram_username')->label('Ник в Telegram');
    }

    protected function getMaxUsernameComponent(): TextInput
    {
        return TextInput::make('max_username')->label('Ник в MAXe');
    }

    protected function getDepartmentComponent(): TextInput
    {
        return TextInput::make('department.dep_name')
            ->label('Отдел')
            ->disabled()
            ->dehydrated(false)
            ->afterStateHydrated(function (TextInput $component) {
                $user = filament()->auth()->user();
                if ($user->department) {
                    $component->state($user->department->dep_name);
                } else {
                    $component->state('Обратитесь к администратору для изменения данных');
                }
            });
    }

    protected function getPositionComponent(): TextInput
    {
        return TextInput::make('position.name')
            ->label('Должность')
            ->disabled()
            ->dehydrated(false)
            ->afterStateHydrated(function (TextInput $component) {
                $user = filament()->auth()->user();
                if ($user->position) {
                    $component->state($user->position->name);
                } else {
                    $component->state('Обратитесь к администратору для изменения данных');
                }
            });
    }
}
