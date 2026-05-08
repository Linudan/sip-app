<?php

return [
    'my_equipment' => [
        'navigation_label' => 'Оборудование',
        'singular_label'   => 'Оборудование',
        'plural_label'     => 'Оборудование',
        'tabs'             => [
            'my'         => 'Моё оборудование',
            'department' => 'Оборудование отдела',
        ],
        'table'            => [
            'category'         => 'Категория',
            'name'             => 'Наименование',
            'inventory_number' => 'Инвентарный номер',
            'serial_number'    => 'Серийный номер',
            'manufacturer'     => 'Производитель',
            'model'            => 'Модель',
            'status'           => 'Статус',
            'user'             => 'Пользователь',
        ],
        'view'             => [
            'basic_info'   => 'Основная информация',
            'location'     => 'Местоположение',
            'additional'   => 'Дополнительно',
            'current_user' => 'Текущий пользователь',
            'department'   => 'Отдел',
            'notes'        => 'Примечания',
        ],
    ],

    'my_tickets'   => [
        'navigation_label' => 'Мои заявки',
        'singular_label'   => 'Заявка',
        'plural_label'     => 'Заявки',
        'tabs'             => [
            'active'    => 'Активные',
            'completed' => 'Завершённые',
        ],
        'actions'          => [
            'create' => 'Создать заявку',
            'save'   => 'Сохранить',
            'cancel' => 'Отмена',
        ],
        'form'             => [
            'title'              => 'Тема',
            'description'        => 'Описание',
            'category_id'        => 'Категория',
            'equipment_item_id'  => 'Оборудование',
            'priority'           => 'Приоритет',
            'telegram_chat_link' => 'Чат в Telegram (ссылка)',
            'max_chat_link'      => 'Чат в MAXe (ссылка)',
        ],
        'placeholders'     => [
            'equipment_item' => 'Выберите оборудование (необязательно)',
        ],
        'messages'         => [
            'created_success' => 'Заявка успешно создана.',
        ],
        'table'            => [
            'ticket_number' => 'Номер',
            'title'         => 'Тема',
            'category'      => 'Категория',
            'priority'      => 'Приоритет',
            'status'        => 'Статус',
            'created_at'    => 'Создана',
        ],
        'view'             => [
            'ticket_info' => 'Информация о заявке',
            'description' => 'Описание',
            'equipment'   => 'Оборудование',
            'feedback'    => 'Обратная связь',
            'rating'      => 'Оценка',
            'review'      => 'Отзыв',
            'resolved_at' => 'Решена',
            'closed_at'   => 'Закрыта',
            'created_at'  => 'Создана',
        ],
    ],

    'statuses'     => [
        'in_use'      => 'Используется',
        'in_stock'    => 'В наличии',
        'in_repair'   => 'В ремонте',
        'written_off' => 'Списано',
        'new'         => 'Новая',
        'in_progress' => 'В работе',
        'pending'     => 'В ожидании',
        'resolved'    => 'Решена',
        'closed'      => 'Закрыта',
        'cancelled'   => 'Отменена',
    ],

    'priorities'   => [
        'low'      => 'Низкий',
        'medium'   => 'Средний',
        'high'     => 'Высокий',
        'critical' => 'Критический',
    ],

    'widgets'      => [
        'user_info'      => [
            'title'          => 'Информация о пользователе',
            'name'           => 'Имя',
            'surname'        => 'Фамилия',
            'patronymic'     => 'Отчество',
            'department'     => 'Отдел',
            'position'       => 'Должность',
            'phone'          => 'Телефон',
            'internal_phone' => 'Внутренний телефон',
            'telegram'       => 'Telegram',
            'max_username'   => 'MAX',
            'no_data'        => '—',
        ],
        'ticket_stats'   => [
            'title'    => 'Мои заявки',
            'total'    => 'Всего',
            'active'   => 'Активные',
            'resolved' => 'Решённые',
            'closed'   => 'Закрытые',
        ],
        'latest_tickets' => [
            'title'         => 'Последние активные заявки',
            'columns'       => [
                'ticket_number' => 'Номер',
                'title'         => 'Тема',
                'priority'      => 'Приоритет',
                'status'        => 'Статус',
                'created_at'    => 'Создана',
            ],
            'empty_message' => 'У вас нет активных заявок',
        ],
        'quick_ticket'   => [
            'title'           => 'Быстрое создание заявки',
            'submit'          => 'Отправить заявку',
            'success_message' => 'Заявка успешно создана',
        ],
    ],
];
