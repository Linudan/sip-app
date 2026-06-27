<?php

// Russian Localization
return [
    // Переводы для ресурса Departments (Отделы)
    "departments"          => [
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
            'deleted_at'  => 'Дата удаления',
        ],

        // Placeholders
        "placeholder"      => [
            'dep_name'    => "Отдел",
            'description' => "Описание",
            'created_at'  => 'Дата создания',
            'updated_at'  => 'Дата редактирования',
            'deleted_at'  => 'Дата удаления',
        ],

        'users'            => [
            'label'   => 'Пользователи',
            'empty'   => 'Нет пользователей в этом отделе',
            'columns' => [
                'full_name' => 'ФИО',
                'email'     => 'Email',
                'phone'     => 'Телефон',
                'position'  => 'Должность',
            ],
        ],
    ],

    // Переводы для ресурса Positions (Должности)
    "positions"            => [
        'navigation_label' => "Должности",
        'label'            => "Должность",
        'plural_label'     => "Должности",
        'singular_label'   => "Должность",
        'table_title'      => "Таблица должностей",
        "columns"          => [
            'name'        => 'Название должности',
            'description' => 'Описание',
            'created_at'  => 'Дата создания',
            'updated_at'  => 'Дата редактирования',
            'deleted_at'  => 'Дата удаления',
        ],
        "placeholder"      => [
            'name'        => 'Название должности',
            'description' => 'Описание',
            'created_at'  => 'Дата создания',
            'updated_at'  => 'Дата редактирования',
            'deleted_at'  => 'Дата удаления',
        ],
    ],

    // Переводы для ресурса Users (Пользователи)
    "users"                => [
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
            'internal_phone'            => 'Внутренний телефон',
            'telegram_username'         => 'Ник в телеграмме',
            'max_username'              => 'Ник в MAXe',
            'department'                => 'Отдел',
            'position'                  => 'Должность',
            'avatar_url'                => 'Путь до фото профиля',
            'email_verified_at'         => 'Дата подтверждения почты',
            'password'                  => 'Пароль',
            'two_factor_secret'         => 'Код двухфакторной аутентификации',
            'two_factor_recovery_codes' => 'Коды восстановления двухфакторной аутентификации',
            'two_factor_confirmed_at'   => 'Дата подключения TOTP',
            'last_login_at'             => 'Дата последней авторизации',
            'created_at'                => 'Дата регистрации',
            'updated_at'                => 'Дата редактирования профиля',
            'deleted_at'                => 'Дата уделения',
        ],

        // Placeholders
        "placeholder"      => [
            'name'                      => 'Имя',
            'surname'                   => 'Фамилия',
            'patronymic'                => 'Отчество',
            'email'                     => 'Почта',
            'phone'                     => 'Телефон',
            'internal_phone'            => 'Внутренний телефон',
            'telegram_username'         => 'Ник в телеграмме',
            'max_username'              => 'Ник в MAXe',
            'department'                => 'Отдел',
            'position'                  => 'Должность',
            'avatar_url'                => 'Путь до фото профиля',
            'email_verified_at'         => 'Дата подтверждения почты',
            'password'                  => 'Пароль',
            'two_factor_secret'         => 'Код двухфакторной аутентификации',
            'two_factor_recovery_codes' => 'Коды восстановления двухфакторной аутентификации',
            'two_factor_confirmed_at'   => 'Дата подключения TOTP',
            'last_login_at'             => 'Дата последней авторизации',
            'created_at'                => 'Дата регистрации',
            'updated_at'                => 'Дата редактирования профиля',
        ],

        // View Users Cards
        "view_cards"       => [
            'personal_information' => 'Личная информация',
            'contacts'             => 'Контакты',
            'department'           => 'Отдел',
            'security'             => 'Безопасность',
            'activity'             => 'Активность',
        ],

        "validation"       => [
            "email_unique" => "Пользователь с таким email уже существует.",
        ],

        'tickets'          => [
            'label' => 'Заявки',
            'empty' => 'У пользователя нет заявок',
        ],
        'equipment'        => [
            'label' => 'Оборудование',
            'empty' => 'У пользователя нет оборудования',
        ],
    ],

    // Переводы для ресурса Equipments (Оборудование)
    "equipments"           => [
        'navigation_label'      => "Оборудование",
        'label'                 => "Оборудование",
        'plural_label'          => "Оборудование",
        'singular_label'        => "Оборудование",
        'table_title'           => "Таблица оборудования",
        // Перевод столбцов таблицы
        "columns"               => [
            'deleted_at'         => 'Дата удаления',
            'category_name'      => "Категория",
            'name'               => 'Hазвание',
            'inventory_number'   => 'Инвентарный номер',
            'serial_number'      => 'Серийный номер',
            'manufacturer'       => 'Производитель',
            'model'              => 'Модель',
            'specifications'     => 'Подробные характеристики',
            'status'             => 'Статус',
            'purchase_date'      => 'Дата покупки',
            'warranty_until'     => 'Списание',
            'purchase_price'     => 'Стоимость покупки',
            'user_name'          => 'Пользователь',
            'department_id'      => 'Отдел',
            'current_user'       => 'Текущий пользователь',
            'current_department' => 'Текущий отдел',
            'notes'              => 'Примечание',
            'qr_code_hash'       => 'Hash-qr-кода',
            'created_at'         => 'Дата создания',
            'updated_at'         => 'Дата редактирования',
            'attachments'        => 'Вложения',
        ],

        // Placeholders
        "placeholder"           => [
            'deleted_at'         => 'Дата удаления',
            'category_name'      => "Категория",
            'name'               => 'Hазвание',
            'inventory_number'   => 'Инвентарный номер',
            'serial_number'      => 'Серийный номер',
            'manufacturer'       => 'Производитель',
            'model'              => 'Модель',
            'status'             => 'Статус',
            'purchase_date'      => 'Дата покупки',
            'warranty_until'     => 'Списание',
            'purchase_price'     => 'Стоимость покупки',
            'user_name'          => 'Пользователь',
            'department_id'      => 'Отдел',
            'current_user'       => 'Не назначен',
            'current_department' => 'Не указан',
            'qr_code_hash'       => 'Hash-qr-кода',
            'created_at'         => 'Дата создания',
            'updated_at'         => 'Дата редактирования',
        ],

        "actions"               => [
            'assign' => 'Назначить пользователю',
            'return' => 'Вернуть на склад',
            'open'   => 'Открыть',
        ],

        "modals"                => [
            'assign_user' => 'Выберите пользователя',
        ],

        "new_eq_widget"         => [
            'table_name'       => 'Новое оборудование',
            'name'             => 'Hаименование',
            'inventory_number' => 'Инвентарный номер',
            'status'           => 'Статус',
            'purchase_date'    => 'Дата покупки',
            'empty'            => 'Нет оборудования',
        ],

        "stat_widget"           => [
            'total'            => 'Всего оборудования',
            'total_desc'       => 'Единиц техники',
            'in_stock'         => 'В наличии',
            'in_stock_desc'    => 'Свободное',
            'in_use'           => 'В использовании',
            'in_use_desc'      => 'Выдано пользователям',
            'in_repair'        => 'В ремонте',
            'in_repair_desc'   => 'Требует внимания',
            'written_off'      => 'Списано',
            'written_off_desc' => 'Выведено из эксплуатации',
        ],

        "messages"              => [
            'already_assigned' => 'Оборудование уже назначено другому пользователю!',
            'assigned_success' => 'Оборудование успешно назначено.',
            'returned_success' => 'Оборудование возвращено на склад.',
        ],

        'enums'                 => [
            'status' => [
                'in_use'      => 'Используется',
                'in_stock'    => 'В наличии/на складе',
                'in_repair'   => 'В ремонте',
                'written_off' => 'Списано',
            ],
        ],

        // View Equipments Cards
        "view_equipments_cards" => [
            'basic_information'       => 'Основная информация',
            'detailed_specifications' => 'Подробные характеристики',
            'location'                => 'Местоположение',
            'financial_data'          => 'Финансовые данные',
            'additionally'            => 'Дополнительно',
            'system_information'      => 'Системная информация',
            'attachments'             => 'Вложения',
            'no_attachments'          => 'Нет прикреплённых файлов',
        ],

        "helper_text"           => [
            'attachments' => 'Разрешённые форматы: изображения, документы (PDF, DOC, XLS, PPT, TXT, RTF, ODT, ODS, ODP) и Markdown. Макс. размер 10 МБ.',
        ],
    ],

    // Переводы для ресурса Equipment Categories (Категории оборудования)
    "equipment-сategories" => [
        'navigation_label' => "Категории оборудования",
        'label'            => "Категория оборудования",
        'plural_label'     => "Категории оборудования",
        'singular_label'   => "Категория оборудования",
        'table_title'      => "Таблица категорий оборудования",

        // Перевод столбцов таблицы
        "columns"          => [
            'name'        => 'Название',
            'slug'        => 'URL-префикс',
            'description' => 'Описание',
            'parent_name' => 'Родительская категория',
            'created_at'  => 'Дата создания',
            'updated_at'  => 'Дата редактирования',
        ],

        // Placeholders
        "placeholder"      => [
            'name'        => 'Название',
            'slug'        => 'URL-префикс',
            'description' => 'Описание',
            'parent_name' => 'Родительская категория',
            'created_at'  => 'Дата создания',
            'updated_at'  => 'Дата редактирования',
        ],

        'equipment'        => [
            'label' => 'Оборудование',
            'empty' => 'В этой категории нет оборудования',
        ],
    ],

    // Переводы для ресурса Equipment Histories (История оборудования)
    "equipment-histories"  => [
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

        // Enums
        'enums'            => [
            // Action
            'action' => [
                'assigned'       => 'Назначено',
                'returned'       => 'Возвращено',
                'repaired'       => 'Отремонтировано',
                'status_changed' => 'Статус изменён',
                'created'        => 'Создано',
                'updated'        => 'Обновлено',
            ],
        ],
    ],

    // Переводы для ресурса Tikets (Заявки)
    "tikets"               => [
        'navigation_label'   => "Заявки",
        'label'              => "Заявки",
        'plural_label'       => "Заявки",
        'singular_label'     => "Заявка",
        'table_title'        => "Таблица заявок",

        // Перевод столбцов таблицы
        "columns"            => [
            'deleted_at'          => 'Дата удаления',
            'ticket_number'       => 'Номер заявки',
            'user_name'           => 'Имя пользователя',
            'category_name'       => 'Категория',
            'equipment_item_name' => 'Оборудование',
            'title'               => 'Проблема',
            'priority'            => 'Приоритет',
            'status'              => 'Статус',
            'telegram_chat_link'  => 'Чат в телеграмме',
            'max_chat_link'       => 'Чат в максе',
            'resolved_at'         => 'Дата создания',
            'closed_at'           => 'Дата закрытия',
            'user_rating'         => 'Оценка',
            'created_at'          => 'Дата создания',
            'updated_at'          => 'Дата редактирования',

        ],

        // Placeholders
        "placeholder"        => [
            'deleted_at'          => 'Дата удаления',
            'ticket_number'       => 'Номер заявки',
            'user_name'           => 'Имя пользователя',
            'category_name'       => 'Категория',
            'equipment_item_name' => 'Оборудование',
            'title'               => 'Проблема',
            'description'         => 'Описание',
            'priority'            => 'Приоритет',
            'status'              => 'Статус',
            'telegram_chat_link'  => 'Чат в телеграмме',
            'max_chat_link'       => 'Чат в максе',
            'resolved_at'         => 'Дата создания',
            'closed_at'           => 'Дата закрытия',
            'user_rating'         => 'Оценка',
            'user_feedback'       => 'Обратная связь',
            'created_at'          => 'Дата создания',
            'updated_at'          => 'Дата редактирования',
        ],

        'actions'            => [
            'change_status' => 'Изменить статус',
        ],

        'messages'           => [
            'status_changed' => 'Статус успешно изменён',
        ],

        // Enums
        'enums'              => [
            // Priority
            'priority' => [
                'low'      => 'Низкий',
                'medium'   => 'Средний',
                'high'     => 'Высокий',
                'critical' => 'Критический',
            ],
            'status'   => [
                'new'         => 'Новая',
                'in_progress' => 'В работе',
                'pending'     => 'В ожидании',
                'resolved'    => 'Решенная',
                'closed'      => 'Завершённая',
                'cancelled'   => 'Отменённая',
            ],
        ],

        "stat_widget"        => [
            'total'            => 'Всего заявок',
            'total_desc'       => 'Общее количество',
            'new'              => 'Новые',
            'new_desc'         => 'Ожидают обработки',
            'in_progress'      => 'В работе',
            'in_progress_desc' => 'Активные заявки',
            'resolved'         => 'Решённые',
            'resolved_desc'    => 'Ожидают закрытия',
            'closed'           => 'Закрытые',
            'closed_desc'      => 'Завершённые',
        ],

        "last_tikets_widget" => [
            'table_name'    => 'Последние поступившие заявки ',
            'ticket_number' => 'Номер заявки',
            'title'         => 'Проблема',
            'user_name'     => 'Пользователь',
            'status'        => 'Статус',
            'resolved_at'   => 'Создана',
        ],

        // View Tikets Cards
        "view_tikets_cards"  => [
            'basic_information'  => 'Основная информация',
            'descrption'         => 'Описание',
            'user_and_equipment' => 'Пользователь и оборудование',
            'attachments'        => 'Вложения',
            'attachments_list'   => 'Список прикрепленных файлов',
            'no_attachments'     => 'Нет прикреплённых файлов',
            'assigned_users'     => 'Назначенные специалисты',
            'communication'      => 'Чаты и связь',
            'time'               => 'Временные метки',
            'rating_and_review'  => 'Рейтинг и отзыв',
        ],

        // Assignments
        'assignments'        => [
            'label'            => 'Исполнители',
            'singular'         => 'Исполнитель',
            'primary'          => 'Основной исполнитель',
            'assigned_at'      => 'Назначен',
            'add_action'       => 'Добавить исполнителя',
            'already_assigned' => 'Этот исполнитель уже назначен',
            'added_success'    => 'Исполнитель добавлен',
            'empty'            => 'Нет назначенных исполнителей',
        ],

    ],

    // Переводы для ресурса Ticket Categories (Категории заявок)
    "ticket-categories"    => [
        'navigation_label' => "Категории заявок",
        'label'            => "Категории заявок",
        'plural_label'     => "Категории заявок",
        'singular_label'   => "Категория заявок",
        'table_title'      => "Таблица категорий заявок",

        // Перевод столбцов таблицы
        "columns"          => [
            'name'        => 'Название категории',
            'slug'        => 'URL-префикс',
            'description' => 'Описание',
            'created_at'  => 'Дата создания',
            'updated_at'  => 'Дата редактирования',
        ],

        // Placeholders
        "placeholder"      => [
            'name'       => 'Название категории',
            'slug'       => 'URL-префикс',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата редактирования',
        ],

        'tickets'          => [
            'label' => 'Заявки',
            'empty' => 'В этой категории нет заявок',
        ],
    ],

    // Переводы для ресурса Attachments (Вложения)
    "attachments"          => [
        'navigation_label' => "Вложения",
        'label'            => "Вложение",
        'plural_label'     => "Вложения",
        'singular_label'   => "Вложение",
        'table_title'      => "Таблица вложений",

        // Перевод столбцов таблицы
        "columns"          => [
            'attachable_type' => 'Тип',
            'attachable_id'   => 'ID',
            'file_path'       => 'Путь до файла',
            'original_name'   => 'Имя файла',
            'mime_type'       => 'Тип файла',
            'size'            => 'Размер файла',
            'uploaded_by'     => 'Кем загружено',
            'created_at'      => 'Дата создания',
            'updated_at'      => 'Дата редактирования',
        ],

        // Placeholders
        "placeholder"      => [
            'attachable_type' => 'Тип',
            'attachable_id'   => 'ID',
            'file_path'       => 'Путь до файла',
            'original_name'   => 'Имя файла',
            'mime_type'       => 'Тип файла',
            'size'            => 'Размер файла',
            'uploaded_by'     => 'Кем загружено',
            'created_at'      => 'Дата создания',
            'updated_at'      => 'Дата редактирования',
        ],
    ],

    // Переводы для групп
    "groups"               => [
        "tikets_group_label"     => "Управление заявками",
        "equipments_group_label" => "Управление оборудованием",
        "users_group_label"      => "Управление пользователями",
        "settings_group_label"   => "Настройки",
        "audit_group_label"      => "Аудит действий",
    ],

    // Общие переводы
    "share"                => [
        'empty_table_heading'     => 'В таблице нет записей',
        'empty_table_description' => 'Начните с создания первой записи',
    ],

    // Переводы ролей
    'roles'                => [
        'admin'         => 'Администратор',
        'it_specialist' => 'IT-специалист',
        'user'          => 'Пользователь',
        'role_label'    => 'Роль',
    ],

];
