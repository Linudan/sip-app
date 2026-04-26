<x-filament-widgets::widget>
    <div class="flex items-center gap-2 mb-4">
        <x-filament::icon icon="heroicon-o-link" class="h-5 w-5" />
        <span class="text-lg font-semibold">Полезные ссылки</span>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($links as $link)
            <a href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer"
               class="flex flex-col items-center text-center p-4 rounded-xl border border-gray-200 dark:border-gray-700 hover:shadow-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition-all">
                @if(!empty($link['logo']))
                    <img src="{{ $link['logo'] }}" alt="{{ $link['title'] }}" class="h-12 w-12 object-contain mb-3">
                @else
                    @php $icon = $link['icon'] ?? 'heroicon-o-link'; @endphp
                    <x-filament::icon :icon="$icon" class="h-12 w-12 text-primary-500 mb-3" />
                @endif
                <span class="font-medium text-gray-800 dark:text-gray-200">{{ $link['title'] }}</span>
            </a>
        @endforeach
    </div>
</x-filament-widgets::widget>
