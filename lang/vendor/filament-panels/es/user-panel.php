<?php

return [
    'my_equipment' => [
        'navigation_label' => 'Equipos',
        'singular_label'   => 'Equipo',
        'plural_label'     => 'Equipos',
        'tabs'             => [
            'my'         => 'Mis equipos',
            'department' => 'Equipos del departamento',
        ],
        'table'            => [
            'category'         => 'Categoría',
            'name'             => 'Nombre',
            'inventory_number' => 'Nº inventario',
            'serial_number'    => 'Nº serie',
            'manufacturer'     => 'Fabricante',
            'model'            => 'Modelo',
            'status'           => 'Estado',
            'user'             => 'Usuario',
        ],
        'view'             => [
            'basic_info'   => 'Información básica',
            'location'     => 'Ubicación',
            'additional'   => 'Adicional',
            'current_user' => 'Usuario actual',
            'department'   => 'Departamento',
            'notes'        => 'Notas',
        ],
    ],

    'my_tickets'   => [
        'navigation_label' => 'Mis tickets',
        'singular_label'   => 'Ticket',
        'plural_label'     => 'Tickets',
        'tabs'             => [
            'active'    => 'Activos',
            'completed' => 'Completados',
        ],
        'actions'          => [
            'create' => 'Crear ticket',
            'save'   => 'Guardar',
            'cancel' => 'Cancelar',
        ],
        'form'             => [
            'title'              => 'Asunto',
            'description'        => 'Descripción',
            'category_id'        => 'Categoría',
            'equipment_item_id'  => 'Equipo',
            'priority'           => 'Prioridad',
            'telegram_chat_link' => 'Chat de Telegram (enlace)',
            'max_chat_link'      => 'Chat de MAX (enlace)',
        ],
        'placeholders'     => [
            'equipment_item' => 'Seleccione equipo (opcional)',
        ],
        'messages'         => [
            'created_success' => 'Ticket creado correctamente.',
        ],
        'table'            => [
            'ticket_number' => 'Número',
            'title'         => 'Asunto',
            'category'      => 'Categoría',
            'priority'      => 'Prioridad',
            'status'        => 'Estado',
            'created_at'    => 'Creado',
        ],
        'view'             => [
            'ticket_info' => 'Información del ticket',
            'description' => 'Descripción',
            'equipment'   => 'Equipo',
            'feedback'    => 'Opinión',
            'rating'      => 'Valoración',
            'review'      => 'Comentario',
            'resolved_at' => 'Resuelto',
            'closed_at'   => 'Cerrado',
            'created_at'  => 'Creado',
        ],
    ],

    'statuses'     => [
        'in_use'      => 'En uso',
        'in_stock'    => 'En stock',
        'in_repair'   => 'En reparación',
        'written_off' => 'Dado de baja',
        'new'         => 'Nueva',
        'in_progress' => 'En progreso',
        'pending'     => 'Pendiente',
        'resolved'    => 'Resuelta',
        'closed'      => 'Cerrada',
        'cancelled'   => 'Cancelada',
    ],

    'priorities'   => [
        'low'      => 'Baja',
        'medium'   => 'Media',
        'high'     => 'Alta',
        'critical' => 'Crítica',
    ],

    'widgets'      => [
        'user_info'      => [
            'title'          => 'Información del usuario',
            'name'           => 'Nombre',
            'surname'        => 'Apellido',
            'patronymic'     => 'Patronímico',
            'department'     => 'Departamento',
            'position'       => 'Cargo',
            'phone'          => 'Teléfono',
            'internal_phone' => 'Teléfono interno',
            'telegram'       => 'Telegram',
            'max_username'   => 'MAX',
            'no_data'        => '—',
        ],
        'ticket_stats'   => [
            'title'    => 'Mis tickets',
            'total'    => 'Total',
            'active'   => 'Activos',
            'resolved' => 'Resueltos',
            'closed'   => 'Cerrados',
        ],
        'latest_tickets' => [
            'title'         => 'Últimos tickets activos',
            'columns'       => [
                'ticket_number' => 'Número',
                'title'         => 'Asunto',
                'priority'      => 'Prioridad',
                'status'        => 'Estado',
                'created_at'    => 'Creado',
            ],
            'empty_message' => 'No tienes tickets activos',
        ],
        'quick_ticket'   => [
            'title'           => 'Creación rápida de ticket',
            'submit'          => 'Enviar ticket',
            'success_message' => 'Ticket creado correctamente',
        ],
    ],
];
