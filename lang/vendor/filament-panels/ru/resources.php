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
        'label'            => "Оборудование",
        'plural_label'     => "Оборудование",
        'singular_label'   => "Оборудование",
        'table_title'      => "Таблица оборудования",
        // Перевод столбцов таблицы
        "columns"          => [
            'deleted_at'       => 'Дата удаления',
            'category_name'    => "Категория",
            'name'             => 'Hазвание',
            'inventory_number' => 'Инвентарный номер',
            'serial_number'    => 'Серийный номер',
            'manufacturer'     => 'Производитель',
            'model'            => 'Модель',
            'specifications'   => 'Подробные характеристики',
            'status'           => 'Статус',
            'purchase_date'    => 'Дата покупки',
            'warranty_until'   => 'Списание',
            'purchase_price'   => 'Стоимость покупки',
            'user_name'        => 'Пользователь',
            'department_id'    => 'Отдел',
            'notes'            => 'Примечание',
            'qr_code_hash'     => 'Hash-qr-кода',
            'created_at'       => 'Дата создания',
            'updated_at'       => 'Дата редактирования',
        ],

        // Placeholders
        "placeholder"      => [
            'deleted_at'       => 'Дата удаления',
            'category_name'    => "Категория",
            'name'             => 'Hазвание',
            'inventory_number' => 'Инвентарный номер',
            'serial_number'    => 'Серийный номер',
            'manufacturer'     => 'Производитель',
            'model'            => 'Модель',
            'status'           => 'Статус',
            'purchase_date'    => 'Дата покупки',
            'warranty_until'   => 'Списание',
            'purchase_price'   => 'Стоимость покупки',
            'user_name'        => 'Пользователь',
            'department_id'    => 'Отдел',
            'qr_code_hash'     => 'Hash-qr-кода',
            'created_at'       => 'Дата создания',
            'updated_at'       => 'Дата редактирования',
        ],
    ],

    // Переводы для ресурса Equipment Assignments (Назначения оборудования)
    "equipment-assignments" => [
        'navigation_label' => "Назначения оборудования",
        'label'            => "Назначение оборудования",
        'plural_label'     => "Назначения оборудования",
        'singular_label'   => "Назначение оборудования",
        'table_title'      => "Таблица назначений оборудования",

        // Перевод столбцов таблицы
        "columns"          => [
            'equipment_item_name' => 'Название оборудование',
            'user_name'           => 'Пользователь',
            'assigned_by'         => 'Назначено/Выдано',
            'assigned_at'         => 'Дата назначения/выдачи',
            'returned_at'         => 'Дата возвращения',
            'return_reason'       => 'Причина возвращения',
            'is_current'          => 'Статус',
            'created_at'          => 'Дата создания',
            'updated_at'          => 'Дата редактирования',
        ],

        // Placeholders
        "placeholder"      => [
            'equipment_item_name' => 'Оборудование',
            'user_name'           => 'Пользователь',
            'assigned_by'         => 'Назначено / Выдано',
            'assigned_at'         => 'Дата назначения / выдачи',
            'returned_at'         => 'Дата возвращения',
            'is_current'          => 'Статус',
            'created_at'          => 'Дата создания',
            'updated_at'          => 'Дата редактирования',
        ],
    ],

    // Переводы для ресурса Equipment Categories (Категории оборудования)
    "equipment-сategories"  => [
        'navigation_label' => "Категории оборудования",
        'label'            => "Категория оборудования",
        'plural_label'     => "Категории оборудования",
        'singular_label'   => "Категория оборудования",
        'table_title'      => "Таблица категорий оборудования",

        // Перевод столбцов таблицы
        "columns"          => [
            'name'        => 'Название',
            'slug'        => 'URL-префикс',
            'parent_name' => 'Родительская категория',
            'icon'        => 'Путь до иконки',
            'created_at'  => 'Дата создания',
            'updated_at'  => 'Дата редактирования',
        ],

        // Placeholders
        "placeholder"      => [
            'name'        => 'Название',
            'slug'        => 'URL-префикс',
            'parent_name' => 'Родительская категория',
            'icon'        => 'Путь до иконки',
            'created_at'  => 'Дата создания',
            'updated_at'  => 'Дата редактирования',
        ],
    ],

    // Переводы для ресурса Equipment Histories (История оборудования)
    "equipment-histories"   => [
        'navigation_label' => "История оборудования",
        'label'            => "История оборудования",
        'plural_label'     => "История оборудования",
        'singular_label'   => "История оборудования",
        'table_title'      => "Таблица истории оборудования",

        // Перевод столбцов таблицы
        "columns"          => [
            'user_name'           => 'Пользователь',
            'equipment_item_name' => 'Название оборудования',
            'action'              => 'Действия',
            'details'             => 'Примечание',
            'created_at'          => 'Дата создания',
            'updated_at'          => 'Дата редактирования',
        ],

        // Placeholders
        "placeholder"      => [
            'user_name'           => 'Пользователь',
            'equipment_item_name' => 'Название оборудования',
            'action'              => 'Действия',
            'created_at'          => 'Дата создания',
            'updated_at'          => 'Дата редактирования',
        ],
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

    // Общие переводы
    "share"                 => [
        'empty_table_heading'     => 'В таблице нет записей',
        'empty_table_description' => 'Начните с создания первой записи',
    ],
];
