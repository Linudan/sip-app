<?php

return [
    'my_equipment' => [
        'navigation_label' => 'Equipment',
        'singular_label'   => 'Equipment',
        'plural_label'     => 'Equipment',
        'tabs'             => [
            'my'         => 'My Equipment',
            'department' => 'Department Equipment',
        ],
        'table'            => [
            'category'         => 'Category',
            'name'             => 'Name',
            'inventory_number' => 'Inventory Number',
            'serial_number'    => 'Serial Number',
            'manufacturer'     => 'Manufacturer',
            'model'            => 'Model',
            'status'           => 'Status',
            'user'             => 'User',
        ],
        'view'             => [
            'basic_info'   => 'Basic Information',
            'location'     => 'Location',
            'additional'   => 'Additional',
            'current_user' => 'Current User',
            'department'   => 'Department',
            'notes'        => 'Notes',
        ],
    ],

    'my_tickets'   => [
        'navigation_label' => 'My Tickets',
        'singular_label'   => 'Ticket',
        'plural_label'     => 'Tickets',
        'tabs'             => [
            'active'    => 'Active',
            'completed' => 'Completed',
        ],
        'actions'          => [
            'create' => 'Create Ticket',
            'save'   => 'Save',
            'cancel' => 'Cancel',
        ],
        'form'             => [
            'title'              => 'Title',
            'description'        => 'Description',
            'category_id'        => 'Category',
            'equipment_item_id'  => 'Equipment',
            'priority'           => 'Priority',
            'telegram_chat_link' => 'Telegram Chat (link)',
            'max_chat_link'      => 'MAX Chat (link)',
        ],
        'placeholders'     => [
            'equipment_item' => 'Select equipment (optional)',
        ],
        'messages'         => [
            'created_success' => 'Ticket created successfully.',
        ],
        'table'            => [
            'ticket_number' => 'Number',
            'title'         => 'Title',
            'category'      => 'Category',
            'priority'      => 'Priority',
            'status'        => 'Status',
            'created_at'    => 'Created',
        ],
        'view'             => [
            'ticket_info' => 'Ticket Information',
            'description' => 'Description',
            'equipment'   => 'Equipment',
            'feedback'    => 'Feedback',
            'rating'      => 'Rating',
            'review'      => 'Review',
            'resolved_at' => 'Resolved',
            'closed_at'   => 'Closed',
            'created_at'  => 'Created',
        ],
    ],

    'statuses'     => [
        'in_use'      => 'In Use',
        'in_stock'    => 'In Stock',
        'in_repair'   => 'In Repair',
        'written_off' => 'Written Off',
        'new'         => 'New',
        'in_progress' => 'In Progress',
        'pending'     => 'Pending',
        'resolved'    => 'Resolved',
        'closed'      => 'Closed',
        'cancelled'   => 'Cancelled',
    ],

    'priorities'   => [
        'low'      => 'Low',
        'medium'   => 'Medium',
        'high'     => 'High',
        'critical' => 'Critical',
    ],

    'widgets'      => [
        'user_info'      => [
            'title'          => 'User Information',
            'name'           => 'First Name',
            'surname'        => 'Last Name',
            'patronymic'     => 'Patronymic',
            'department'     => 'Department',
            'position'       => 'Position',
            'phone'          => 'Phone',
            'internal_phone' => 'Internal Phone',
            'telegram'       => 'Telegram',
            'max_username'   => 'MAX',
            'no_data'        => '—',
        ],
        'ticket_stats'   => [
            'title'        => 'My Tickets',
            'total'        => 'Total',
            'active'       => 'Active',
            'resolved'     => 'Resolved',
            'closed'       => 'Closed',
            'total_desc'   => 'Total number of tickets',
            'active_desc'  => 'Tickets in progress or pending',
            'resolved_desc'=> 'Tickets awaiting closure',
            'closed_desc'  => 'Finally closed tickets',
        ],
        'latest_tickets' => [
            'title'         => 'Latest Active Tickets',
            'columns'       => [
                'ticket_number' => 'Number',
                'title'         => 'Title',
                'priority'      => 'Priority',
                'status'        => 'Status',
                'created_at'    => 'Created',
            ],
            'empty_message' => 'You have no active tickets',
            'actions'       => [
                'view' => 'Open',
            ],
        ],
        'quick_ticket'   => [
            'title'           => 'Quick Create Ticket',
            'submit'          => 'Submit Ticket',
            'success_message' => 'Ticket created successfully',
        ],
    ],
];
