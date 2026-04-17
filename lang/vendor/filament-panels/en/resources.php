<?php

// English Localization
return [
    // Translations for Departments resource
    "departments"           => [
        'navigation_label' => "Departments",
        'label'            => "Department",
        'plural_label'     => "Departments",
        'singular_label'   => "Department",
        'table_title'      => "Departments Table",
        // Table columns
        "columns"          => [
            'dep_name'    => "Department",
            'description' => "Description",
            'created_at'  => 'Created at',
            'updated_at'  => 'Updated at',
        ],

        // Placeholders
        "placeholder"      => [
            'dep_name'    => "Department",
            'description' => "Description",
            'created_at'  => 'Created at',
            'updated_at'  => 'Updated at',
        ],
    ],

    // Translations for Users resource
    "users"                 => [
        'navigation_label' => "Users",
        'label'            => "User",
        'plural_label'     => "Users",
        'singular_label'   => "User",
        'table_title'      => "Users Table",
        // Table columns
        "columns"          => [
            'name'                      => 'First Name',
            'surname'                   => 'Last Name',
            'patronymic'                => 'Patronymic',
            'email'                     => 'Email',
            'phone'                     => 'Phone',
            'telegram_username'         => 'Telegram Username',
            'max_username'              => 'MAX Username',
            'department'                => 'Department',
            'position'                  => 'Position',
            'profile_photo_path'        => 'Profile Photo Path',
            'email_verified_at'         => 'Email Verified At',
            'password'                  => 'Password',
            'two_factor_secret'         => 'Two-Factor Secret',
            'two_factor_recovery_codes' => 'Recovery Codes',
            'two_factor_confirmed_at'   => 'TOTP Enabled At',
            'last_login_at'             => 'Last Login At',
            'created_at'                => 'Registered At',
            'updated_at'                => 'Profile Updated At',
        ],

        // Placeholders
        "placeholder"      => [
            'name'                      => 'First Name',
            'surname'                   => 'Last Name',
            'patronymic'                => 'Patronymic',
            'email'                     => 'Email',
            'phone'                     => 'Phone',
            'telegram_username'         => 'Telegram Username',
            'max_username'              => 'MAX Username',
            'department'                => 'Department',
            'position'                  => 'Position',
            'profile_photo_path'        => 'Profile Photo Path',
            'email_verified_at'         => 'Email Verified At',
            'password'                  => 'Password',
            'two_factor_secret'         => 'Two-Factor Secret',
            'two_factor_recovery_codes' => 'Recovery Codes',
            'two_factor_confirmed_at'   => 'TOTP Enabled At',
            'last_login_at'             => 'Last Login At',
            'created_at'                => 'Registered At',
            'updated_at'                => 'Profile Updated At',
        ],
    ],

    // Translations for Equipments resource
    "equipments"            => [
        'navigation_label' => "Equipment",
        'label'            => "Equipment",
        'plural_label'     => "Equipment",
        'singular_label'   => "Equipment",
        'table_title'      => "Equipment Table",
        // Table columns
        "columns"          => [
            'deleted_at'       => 'Deleted At',
            'category_name'    => "Category",
            'name'             => 'Name',
            'inventory_number' => 'Inventory Number',
            'serial_number'    => 'Serial Number',
            'manufacturer'     => 'Manufacturer',
            'model'            => 'Model',
            'specifications'   => 'Specifications',
            'status'           => 'Status',
            'purchase_date'    => 'Purchase Date',
            'warranty_until'   => 'Warranty Until',
            'purchase_price'   => 'Purchase Price',
            'user_name'        => 'User',
            'department_id'    => 'Department',
            'notes'            => 'Notes',
            'qr_code_hash'     => 'QR Code Hash',
            'created_at'       => 'Created At',
            'updated_at'       => 'Updated At',
        ],

        // Placeholders
        "placeholder"      => [
            'deleted_at'       => 'Deleted At',
            'category_name'    => "Category",
            'name'             => 'Name',
            'inventory_number' => 'Inventory Number',
            'serial_number'    => 'Serial Number',
            'manufacturer'     => 'Manufacturer',
            'model'            => 'Model',
            'status'           => 'Status',
            'purchase_date'    => 'Purchase Date',
            'warranty_until'   => 'Warranty Until',
            'purchase_price'   => 'Purchase Price',
            'user_name'        => 'User',
            'department_id'    => 'Department',
            'qr_code_hash'     => 'QR Code Hash',
            'created_at'       => 'Created At',
            'updated_at'       => 'Updated At',
        ],
    ],

    // Translations for Equipment Assignments resource
    "equipment-assignments" => [
        'navigation_label' => "Equipment Assignments",
        'label'            => "Equipment Assignment",
        'plural_label'     => "Equipment Assignments",
        'singular_label'   => "Equipment Assignment",
        'table_title'      => "Equipment Assignments Table",

        // Table columns
        "columns"          => [
            'equipment_item_name' => 'Equipment Name',
            'user_name'           => 'User',
            'assigned_by'         => 'Assigned By',
            'assigned_at'         => 'Assigned At',
            'returned_at'         => 'Returned At',
            'return_reason'       => 'Return Reason',
            'is_current'          => 'Status',
            'created_at'          => 'Created At',
            'updated_at'          => 'Updated At',
        ],

        // Placeholders
        "placeholder"      => [
            'equipment_item_name' => 'Equipment',
            'user_name'           => 'User',
            'assigned_by'         => 'Assigned By',
            'assigned_at'         => 'Assigned At',
            'returned_at'         => 'Returned At',
            'is_current'          => 'Status',
            'created_at'          => 'Created At',
            'updated_at'          => 'Updated At',
        ],
    ],

    // Translations for Equipment Categories resource
    "equipment-сategories"  => [
        'navigation_label' => "Equipment Categories",
        'label'            => "Equipment Category",
        'plural_label'     => "Equipment Categories",
        'singular_label'   => "Equipment Category",
        'table_title'      => "Equipment Categories Table",

        // Table columns
        "columns"          => [
            'name'        => 'Name',
            'slug'        => 'Slug',
            'parent_name' => 'Parent Category',
            'icon'        => 'Icon Path',
            'created_at'  => 'Created At',
            'updated_at'  => 'Updated At',
        ],

        // Placeholders
        "placeholder"      => [
            'name'        => 'Name',
            'slug'        => 'Slug',
            'parent_name' => 'Parent Category',
            'icon'        => 'Icon Path',
            'created_at'  => 'Created At',
            'updated_at'  => 'Updated At',
        ],
    ],

    // Translations for Equipment Histories resource
    "equipment-histories"   => [
        'navigation_label' => "Equipment History",
        'label'            => "Equipment History",
        'plural_label'     => "Equipment Histories",
        'singular_label'   => "Equipment History",
        'table_title'      => "Equipment History Table",

        // Table columns
        "columns"          => [
            'user_name'           => 'User',
            'equipment_item_name' => 'Equipment Name',
            'action'              => 'Action',
            'details'             => 'Details',
            'created_at'          => 'Created At',
            'updated_at'          => 'Updated At',
        ],

        // Placeholders
        "placeholder"      => [
            'user_name'           => 'User',
            'equipment_item_name' => 'Equipment Name',
            'action'              => 'Action',
            'created_at'          => 'Created At',
            'updated_at'          => 'Updated At',
        ],
    ],

    // Translations for Tickets resource (note: "Tikets" kept as is for compatibility)
    "tikets"                => [
        'navigation_label' => "Tickets",
        'label'            => "Tickets",
        'plural_label'     => "Tickets",
        'singular_label'   => "Ticket",
        'table_title'      => "Tickets Table",

        // Table columns
        "columns"          => [
            'deleted_at'          => 'Deleted At',
            'ticket_number'       => 'Ticket Number',
            'user_name'           => 'User Name',
            'category_name'       => 'Category',
            'equipment_item_name' => 'Equipment',
            'title'               => 'Issue',
            'priority'            => 'Priority',
            'status'              => 'Status',
            'telegram_chat_link'  => 'Telegram Chat',
            'max_chat_link'       => 'MAX Chat',
            'resolved_at'         => 'Resolved At',
            'closed_at'           => 'Closed At',
            'user_rating'         => 'Rating',
            'created_at'          => 'Created At',
            'updated_at'          => 'Updated At',
        ],

        // Placeholders
        "placeholder"      => [
            'deleted_at'          => 'Deleted At',
            'ticket_number'       => 'Ticket Number',
            'user_name'           => 'User Name',
            'category_name'       => 'Category',
            'equipment_item_name' => 'Equipment',
            'title'               => 'Issue',
            'description'         => 'Description',
            'priority'            => 'Priority',
            'status'              => 'Status',
            'telegram_chat_link'  => 'Telegram Chat',
            'max_chat_link'       => 'MAX Chat',
            'resolved_at'         => 'Resolved At',
            'closed_at'           => 'Closed At',
            'user_rating'         => 'Rating',
            'user_feedback'       => 'Feedback',
            'created_at'          => 'Created At',
            'updated_at'          => 'Updated At',
        ],
    ],

    // Translations for Ticket Categories resource
    "ticket-categories"     => [
        'navigation_label' => "Ticket Categories",
        'label'            => "Ticket Categories",
        'plural_label'     => "Ticket Categories",
        'singular_label'   => "Ticket Category",
        'table_title'      => "Ticket Categories Table",

        // Table columns
        "columns"          => [
            'name'        => 'Category Name',
            'slug'        => 'Slug',
            'description' => 'Description',
            'created_at'  => 'Created At',
            'updated_at'  => 'Updated At',
        ],

        // Placeholders
        "placeholder"      => [
            'name'       => 'Category Name',
            'slug'       => 'Slug',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ],
    ],

    // Translations for Attachments resource
    "attachments"           => [
        'navigation_label' => "Attachments",
        'label'            => "Attachment",
        'plural_label'     => "Attachments",
        'singular_label'   => "Attachment",
        'table_title'      => "Attachments Table",

        // Table columns
        "columns"          => [
            'attachable_type' => 'Type',
            'attachable_id'   => 'ID',
            'file_path'       => 'File Path',
            'original_name'   => 'File Name',
            'mime_type'       => 'MIME Type',
            'size'            => 'File Size',
            'uploaded_by'     => 'Uploaded By',
            'created_at'      => 'Created At',
            'updated_at'      => 'Updated At',
        ],

        // Placeholders
        "placeholder"      => [
            'attachable_type' => 'Type',
            'attachable_id'   => 'ID',
            'file_path'       => 'File Path',
            'original_name'   => 'File Name',
            'mime_type'       => 'MIME Type',
            'size'            => 'File Size',
            'uploaded_by'     => 'Uploaded By',
            'created_at'      => 'Created At',
            'updated_at'      => 'Updated At',
        ],
    ],

    // Translations for groups
    "groups"                => [
        "other_group_label"      => "Other",
        "tikets_group_label"     => "Ticket Management",
        "equipments_group_label" => "Equipment Management",
        "users_group_label"      => "User Management",
    ],

    // Common translations
    "share"                 => [
        'empty_table_heading'     => 'No records in the table',
        'empty_table_description' => 'Start by creating the first record',
    ],
];
