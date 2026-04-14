<?php

// Russian Localization
return [
    // Переводы для ресурса Departments (Отделы)
    "departments"           => [
        'navigation_label' => "Отделы",
        'label'            => "Отдел",
        'plural_label'     => "Отделы",
        'singular_label'   => "Отдел",
        'table_title'      => "Таблица отделов",
        // Перевод столбцов таблицы
        "columns"          => [
            'dep_name'    => "Отдел",
            'description' => "Описание",
            'created_at'  => 'Дата создания',
            'updated_at'  => 'Дата редактирования',
        ],
        // Placeholders
        "placeholder"      => [
            'dep_name'    => "Отдел",
            'description' => "Описание",
            'created_at'  => 'Дата создания',
            'updated_at'  => 'Дата редактирования',
        ],
    ],

    // Переводы для ресурса Users (Пользователи)
    "users"                 => [
        'navigation_label' => "Пользователи",
        'label'            => "Пользователь",
        'plural_label'     => "Пользователи",
        'singular_label'   => "Пользователь",
        'table_title'      => "Таблица пользователей",
        // Перевод столбцов таблицы
        "columns"          => [
            'name'                      => 'Имя',
            'surname'                   => 'Фамилия',
            'patronymic'                => 'Отчество',
            'email'                     => 'Почта',
            'phone'                     => 'Телефон',
            'telegram_username'         => 'Ник в телеграмме',
            'max_username'              => 'Ник в MAXe',
            'department'                => 'Отдел',
            'position'                  => 'Должность',
            'profile_photo_path'        => 'Путь до фото профиля',
            'email_verified_at'         => 'Дата подтверждения почты',
            'password'                  => 'Пароль',
            'two_factor_secret'         => 'Код двухфакторной аутентификации',
            'two_factor_recovery_codes' => 'Коды восстановления двухфакторной аутентификации',
            'two_factor_confirmed_at'   => 'Дата подключения TOTP',
            'last_login_at'             => 'Дата последней авторизации',
            'created_at'                => 'Дата регистрации',
            'updated_at'                => 'Дата редактирования профиля',
        ],
    ],

    // Переводы для ресурса Equipments (Оборудование)
    "equipments"            => [
        'navigation_label' => "Оборудование",
    ],

    // Переводы для ресурса Equipment Assignments (Назначения оборудования)
    "equipment-assignments" => [
        'navigation_label' => "Назначения оборудования",
    ],

    // Переводы для ресурса Equipment Categories (Категории оборудования)
    "equipment-сategories"  => [
        'navigation_label' => "Категории оборудования",
    ],

    // Переводы для ресурса Equipment Histories (История оборудования)
    "equipment-histories"   => [
        'navigation_label' => "История оборудования",
    ],

    // Переводы для ресурса Tikets (Заявки)
    "tikets"                => [
        'navigation_label' => "Заявки",
    ],

    // Переводы для ресурса Ticket Categories (Категории заявок)
    "ticket-categories"     => [
        'navigation_label' => "Категории заявок",
    ],

    // Переводы для ресурса Attachments (Вложения)
    "attachments"           => [
        'navigation_label' => "Вложения",
    ],

    // Переводы для групп
    "groups"                => [
        "other_group_label"      => "Прочее",
        "tikets_group_label"     => "Управление заявками",
        "equipments_group_label" => "Управление оборудованием",
        "users_group_label"      => "Управление пользователями",
    ],
];
