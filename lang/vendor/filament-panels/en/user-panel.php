<?php

return [
    'my_equipment' => [
        'navigation_label' => 'Equipment',
        'singular_label'   => 'Equipment',
        'plural_label'     => 'Equipment',
        'tabs'             => [
            'my'         => 'My equipment',
            'department' => 'Department equipment',
        ],
        'table'            => [
            'category'         => 'Category',
            'name'             => 'Name',
            'inventory_number' => 'Inventory number',
            'serial_number'    => 'Serial number',
            'manufacturer'     => 'Manufacturer',
            'model'            => 'Model',
            'status'           => 'Status',
            'user'             => 'User',
        ],
        'view'             => [
            'basic_info'   => 'Basic information',
            'location'     => 'Location',
            'additional'   => 'Additional',
            'current_user' => 'Current user',
            'department'   => 'Department',
            'notes'        => 'Notes',
        ],
    ],

    'my_tickets'   => [
        'navigation_label' => 'My tickets',
        'singular_label'   => 'Ticket',
        'plural_label'     => 'Tickets',
        'tabs'             => [
            'active'    => 'Active',
            'completed' => 'Completed',
        ],
        'actions'          => [
            'create' => 'Create ticket',
            'save'   => 'Save',
            'cancel' => 'Cancel',
        ],
        'form'             => [
            'title'              => 'Subject',
            'description'        => 'Description',
            'category_id'        => 'Category',
            'equipment_item_id'  => 'Equipment',
            'priority'           => 'Priority',
            'telegram_chat_link' => 'Telegram chat (link)',
            'max_chat_link'      => 'MAX chat (link)',
        ],
        'placeholders'     => [
            'equipment_item' => 'Select equipment (optional)',
        ],
        'messages'         => [
            'created_success' => 'Ticket created successfully.',
        ],
        'table'            => [
            'ticket_number' => 'Number',
            'title'         => 'Subject',
            'category'      => 'Category',
            'priority'      => 'Priority',
            'status'        => 'Status',
            'created_at'    => 'Created',
        ],
        'view'             => [
            'ticket_info' => 'Ticket information',
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
        'in_use'      => 'In use',
        'in_stock'    => 'In stock',
        'in_repair'   => 'In repair',
        'written_off' => 'Written off',
        'new'         => 'New',
        'in_progress' => 'In progress',
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
            'title'          => 'User information',
            'name'           => 'First name',
            'surname'        => 'Last name',
            'patronymic'     => 'Patronymic',
            'department'     => 'Department',
            'position'       => 'Position',
            'phone'          => 'Phone',
            'internal_phone' => 'Internal phone',
            'telegram'       => 'Telegram',
            'max_username'   => 'MAX',
            'no_data'        => '—',
        ],
        'ticket_stats'   => [
            'title'    => 'My tickets',
            'total'    => 'Total',
            'active'   => 'Active',
            'resolved' => 'Resolved',
            'closed'   => 'Closed',
        ],
        'latest_tickets' => [
            'title'         => 'Latest active tickets',
            'columns'       => [
                'ticket_number' => 'Number',
                'title'         => 'Subject',
                'priority'      => 'Priority',
                'status'        => 'Status',
                'created_at'    => 'Created',
            ],
            'empty_message' => 'You have no active tickets',
        ],
        'quick_ticket'   => [
            'title'           => 'Quick ticket creation',
            'submit'          => 'Submit ticket',
            'success_message' => 'Ticket created successfully',
        ],
    ],
];
