<?php

// Spanish Localization
return [
    // Translations for Departments resource
    "departments"           => [
        'navigation_label' => "Departamentos",
        'label'            => "Departamento",
        'plural_label'     => "Departamentos",
        'singular_label'   => "Departamento",
        'table_title'      => "Tabla de Departamentos",
        // Table columns
        "columns"          => [
            'dep_name'    => "Departamento",
            'description' => "Descripción",
            'created_at'  => 'Creado el',
            'updated_at'  => 'Actualizado el',
        ],

        // Placeholders
        "placeholder"      => [
            'dep_name'    => "Departamento",
            'description' => "Descripción",
            'created_at'  => 'Creado el',
            'updated_at'  => 'Actualizado el',
        ],
    ],

    // Translations for Users resource
    "users"                 => [
        'navigation_label' => "Usuarios",
        'label'            => "Usuario",
        'plural_label'     => "Usuarios",
        'singular_label'   => "Usuario",
        'table_title'      => "Tabla de Usuarios",
        // Table columns
        "columns"          => [
            'name'                      => 'Nombre',
            'surname'                   => 'Apellido',
            'patronymic'                => 'Patronímico',
            'email'                     => 'Correo',
            'phone'                     => 'Teléfono',
            'telegram_username'         => 'Usuario de Telegram',
            'max_username'              => 'Usuario de MAX',
            'department'                => 'Departamento',
            'position'                  => 'Cargo',
            'profile_photo_path'        => 'Ruta de la foto de perfil',
            'email_verified_at'         => 'Correo verificado el',
            'password'                  => 'Contraseña',
            'two_factor_secret'         => 'Secreto de dos factores',
            'two_factor_recovery_codes' => 'Códigos de recuperación',
            'two_factor_confirmed_at'   => 'TOTP activado el',
            'last_login_at'             => 'Último acceso',
            'created_at'                => 'Registrado el',
            'updated_at'                => 'Perfil actualizado el',
        ],

        // Placeholders
        "placeholder"      => [
            'name'                      => 'Nombre',
            'surname'                   => 'Apellido',
            'patronymic'                => 'Patronímico',
            'email'                     => 'Correo',
            'phone'                     => 'Teléfono',
            'telegram_username'         => 'Usuario de Telegram',
            'max_username'              => 'Usuario de MAX',
            'department'                => 'Departamento',
            'position'                  => 'Cargo',
            'profile_photo_path'        => 'Ruta de la foto de perfil',
            'email_verified_at'         => 'Correo verificado el',
            'password'                  => 'Contraseña',
            'two_factor_secret'         => 'Secreto de dos factores',
            'two_factor_recovery_codes' => 'Códigos de recuperación',
            'two_factor_confirmed_at'   => 'TOTP activado el',
            'last_login_at'             => 'Último acceso',
            'created_at'                => 'Registrado el',
            'updated_at'                => 'Perfil actualizado el',
        ],
    ],

    // Translations for Equipments resource
    "equipments"            => [
        'navigation_label' => "Equipos",
        'label'            => "Equipo",
        'plural_label'     => "Equipos",
        'singular_label'   => "Equipo",
        'table_title'      => "Tabla de Equipos",
        // Table columns
        "columns"          => [
            'deleted_at'       => 'Eliminado el',
            'category_name'    => "Categoría",
            'name'             => 'Nombre',
            'inventory_number' => 'Número de inventario',
            'serial_number'    => 'Número de serie',
            'manufacturer'     => 'Fabricante',
            'model'            => 'Modelo',
            'specifications'   => 'Especificaciones',
            'status'           => 'Estado',
            'purchase_date'    => 'Fecha de compra',
            'warranty_until'   => 'Garantía hasta',
            'purchase_price'   => 'Precio de compra',
            'user_name'        => 'Usuario',
            'department_id'    => 'Departamento',
            'notes'            => 'Notas',
            'qr_code_hash'     => 'Hash del código QR',
            'created_at'       => 'Creado el',
            'updated_at'       => 'Actualizado el',
        ],

        // Placeholders
        "placeholder"      => [
            'deleted_at'       => 'Eliminado el',
            'category_name'    => "Categoría",
            'name'             => 'Nombre',
            'inventory_number' => 'Número de inventario',
            'serial_number'    => 'Número de serie',
            'manufacturer'     => 'Fabricante',
            'model'            => 'Modelo',
            'status'           => 'Estado',
            'purchase_date'    => 'Fecha de compra',
            'warranty_until'   => 'Garantía hasta',
            'purchase_price'   => 'Precio de compra',
            'user_name'        => 'Usuario',
            'department_id'    => 'Departamento',
            'qr_code_hash'     => 'Hash del código QR',
            'created_at'       => 'Creado el',
            'updated_at'       => 'Actualizado el',
        ],
    ],

    // Translations for Equipment Assignments resource
    "equipment-assignments" => [
        'navigation_label' => "Asignaciones de Equipos",
        'label'            => "Asignación de Equipo",
        'plural_label'     => "Asignaciones de Equipos",
        'singular_label'   => "Asignación de Equipo",
        'table_title'      => "Tabla de Asignaciones de Equipos",

        // Table columns
        "columns"          => [
            'equipment_item_name' => 'Nombre del Equipo',
            'user_name'           => 'Usuario',
            'assigned_by'         => 'Asignado por',
            'assigned_at'         => 'Fecha de asignación',
            'returned_at'         => 'Fecha de devolución',
            'return_reason'       => 'Motivo de devolución',
            'is_current'          => 'Estado',
            'created_at'          => 'Creado el',
            'updated_at'          => 'Actualizado el',
        ],

        // Placeholders
        "placeholder"      => [
            'equipment_item_name' => 'Equipo',
            'user_name'           => 'Usuario',
            'assigned_by'         => 'Asignado por',
            'assigned_at'         => 'Fecha de asignación',
            'returned_at'         => 'Fecha de devolución',
            'is_current'          => 'Estado',
            'created_at'          => 'Creado el',
            'updated_at'          => 'Actualizado el',
        ],
    ],

    // Translations for Equipment Categories resource
    "equipment-сategories"  => [
        'navigation_label' => "Categorías de Equipos",
        'label'            => "Categoría de Equipo",
        'plural_label'     => "Categorías de Equipos",
        'singular_label'   => "Categoría de Equipo",
        'table_title'      => "Tabla de Categorías de Equipos",

        // Table columns
        "columns"          => [
            'name'        => 'Nombre',
            'slug'        => 'Slug',
            'parent_name' => 'Categoría padre',
            'icon'        => 'Ruta del icono',
            'created_at'  => 'Creado el',
            'updated_at'  => 'Actualizado el',
        ],

        // Placeholders
        "placeholder"      => [
            'name'        => 'Nombre',
            'slug'        => 'Slug',
            'parent_name' => 'Categoría padre',
            'icon'        => 'Ruta del icono',
            'created_at'  => 'Creado el',
            'updated_at'  => 'Actualizado el',
        ],
    ],

    // Translations for Equipment Histories resource
    "equipment-histories"   => [
        'navigation_label' => "Historial de Equipos",
        'label'            => "Historial de Equipo",
        'plural_label'     => "Historiales de Equipos",
        'singular_label'   => "Historial de Equipo",
        'table_title'      => "Tabla de Historial de Equipos",

        // Table columns
        "columns"          => [
            'user_name'           => 'Usuario',
            'equipment_item_name' => 'Nombre del Equipo',
            'action'              => 'Acción',
            'details'             => 'Detalles',
            'created_at'          => 'Creado el',
            'updated_at'          => 'Actualizado el',
        ],

        // Placeholders
        "placeholder"      => [
            'user_name'           => 'Usuario',
            'equipment_item_name' => 'Nombre del Equipo',
            'action'              => 'Acción',
            'created_at'          => 'Creado el',
            'updated_at'          => 'Actualizado el',
        ],
    ],

    // Translations for Tickets resource (note: "Tikets" kept as is for compatibility)
    "tikets"                => [
        'navigation_label' => "Tickets",
        'label'            => "Tickets",
        'plural_label'     => "Tickets",
        'singular_label'   => "Ticket",
        'table_title'      => "Tabla de Tickets",

        // Table columns
        "columns"          => [
            'deleted_at'          => 'Eliminado el',
            'ticket_number'       => 'Número de ticket',
            'user_name'           => 'Nombre del usuario',
            'category_name'       => 'Categoría',
            'equipment_item_name' => 'Equipo',
            'title'               => 'Problema',
            'priority'            => 'Prioridad',
            'status'              => 'Estado',
            'telegram_chat_link'  => 'Chat de Telegram',
            'max_chat_link'       => 'Chat de MAX',
            'resolved_at'         => 'Resuelto el',
            'closed_at'           => 'Cerrado el',
            'user_rating'         => 'Valoración',
            'created_at'          => 'Creado el',
            'updated_at'          => 'Actualizado el',
        ],

        // Placeholders
        "placeholder"      => [
            'deleted_at'          => 'Eliminado el',
            'ticket_number'       => 'Número de ticket',
            'user_name'           => 'Nombre del usuario',
            'category_name'       => 'Categoría',
            'equipment_item_name' => 'Equipo',
            'title'               => 'Problema',
            'description'         => 'Descripción',
            'priority'            => 'Prioridad',
            'status'              => 'Estado',
            'telegram_chat_link'  => 'Chat de Telegram',
            'max_chat_link'       => 'Chat de MAX',
            'resolved_at'         => 'Resuelto el',
            'closed_at'           => 'Cerrado el',
            'user_rating'         => 'Valoración',
            'user_feedback'       => 'Comentarios',
            'created_at'          => 'Creado el',
            'updated_at'          => 'Actualizado el',
        ],
    ],

    // Translations for Ticket Categories resource
    "ticket-categories"     => [
        'navigation_label' => "Categorías de Tickets",
        'label'            => "Categorías de Tickets",
        'plural_label'     => "Categorías de Tickets",
        'singular_label'   => "Categoría de Ticket",
        'table_title'      => "Tabla de Categorías de Tickets",

        // Table columns
        "columns"          => [
            'name'        => 'Nombre de la categoría',
            'slug'        => 'Slug',
            'description' => 'Descripción',
            'created_at'  => 'Creado el',
            'updated_at'  => 'Actualizado el',
        ],

        // Placeholders
        "placeholder"      => [
            'name'       => 'Nombre de la categoría',
            'slug'       => 'Slug',
            'created_at' => 'Creado el',
            'updated_at' => 'Actualizado el',
        ],
    ],

    // Translations for Attachments resource
    "attachments"           => [
        'navigation_label' => "Adjuntos",
        'label'            => "Adjunto",
        'plural_label'     => "Adjuntos",
        'singular_label'   => "Adjunto",
        'table_title'      => "Tabla de Adjuntos",

        // Table columns
        "columns"          => [
            'attachable_type' => 'Tipo',
            'attachable_id'   => 'ID',
            'file_path'       => 'Ruta del archivo',
            'original_name'   => 'Nombre del archivo',
            'mime_type'       => 'Tipo MIME',
            'size'            => 'Tamaño',
            'uploaded_by'     => 'Subido por',
            'created_at'      => 'Creado el',
            'updated_at'      => 'Actualizado el',
        ],

        // Placeholders
        "placeholder"      => [
            'attachable_type' => 'Tipo',
            'attachable_id'   => 'ID',
            'file_path'       => 'Ruta del archivo',
            'original_name'   => 'Nombre del archivo',
            'mime_type'       => 'Tipo MIME',
            'size'            => 'Tamaño',
            'uploaded_by'     => 'Subido por',
            'created_at'      => 'Creado el',
            'updated_at'      => 'Actualizado el',
        ],
    ],

    // Translations for groups
    "groups"                => [
        "other_group_label"      => "Otros",
        "tikets_group_label"     => "Gestión de Tickets",
        "equipments_group_label" => "Gestión de Equipos",
        "users_group_label"      => "Gestión de Usuarios",
    ],

    // Common translations
    "share"                 => [
        'empty_table_heading'     => 'No hay registros en la tabla',
        'empty_table_description' => 'Comience creando el primer registro',
    ],
];
