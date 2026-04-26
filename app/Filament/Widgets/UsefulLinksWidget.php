<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class UsefulLinksWidget extends Widget
{
    protected static ?int $sort = 4;
    protected int|string|array $columnSpan = 'full';

    protected function getLinks(): array
    {
        return [
            [
                'title' => 'Документация IT-отдела',
                'url'   => 'https://wiki.example.com',
                'icon'  => 'heroicon-o-book-open',
                'logo'  => null,
            ],
            [
                'title' => 'Портал заявок (пользовательский)',
                'url'   => 'https://helpdesk.example.com',
                'icon'  => 'heroicon-o-lifebuoy',
                'logo'  => null,
            ],
            [
                'title' => 'База знаний оборудования',
                'url'   => 'https://kb.example.com',
                'icon'  => 'heroicon-o-document-text',
                'logo'  => null,
            ],
            [
                'title' => 'Служба поддержки поставщиков',
                'url'   => 'https://vendor.example.com',
                'icon'  => 'heroicon-o-user-group',
                'logo'  => null,
            ],
        ];
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('filament.widgets.useful-links-widget', [
            'links' => $this->getLinks(),
        ]);
    }
}
