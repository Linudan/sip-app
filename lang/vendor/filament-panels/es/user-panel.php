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
            'inventory_number' => 'Número de inventario',
            'serial_number'    => 'Número de serie',
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
            'telegram_chat_link' => 'Enlace del chat en Telegram',
            'max_chat_link'      => 'Enlace del chat en MAX',
        ],
        'placeholders'     => [
            'equipment_item' => 'Seleccione equipo (opcional)',
        ],
        'messages'         => [
            'created_success' => 'Ticket creado exitosamente.',
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
            'feedback'    => 'Comentarios',
            'rating'      => 'Valoración',
            'review'      => 'Reseña',
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
        'new'         => 'Nuevo',
        'in_progress' => 'En progreso',
        'pending'     => 'Pendiente',
        'resolved'    => 'Resuelto',
        'closed'      => 'Cerrado',
        'cancelled'   => 'Cancelado',
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
            'title'        => 'Mis tickets',
            'total'        => 'Total',
            'active'       => 'Activos',
            'resolved'     => 'Resueltos',
            'closed'       => 'Cerrados',
            'total_desc'   => 'Número total de tickets',
            'active_desc'  => 'Tickets en progreso o pendientes',
            'resolved_desc'=> 'Tickets pendientes de cierre',
            'closed_desc'  => 'Tickets cerrados definitivamente',
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
            'actions'       => [
                'view' => 'Abrir',
            ],
        ],
        'quick_ticket'   => [
            'title'           => 'Creación rápida de ticket',
            'submit'          => 'Enviar ticket',
            'success_message' => 'Ticket creado exitosamente',
        ],
    ],
];
