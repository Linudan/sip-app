@props([
    'data'
])
<a x-data="{}"
    x-on:click.prevent="window.navigator.clipboard.writeText(@js($data));$tooltip('{{ __('filament-breezy::default.clipboard.tooltip') }}');"
    href="#"
    class="inline-flex items-center gap-1 text-sm font-medium text-primary-600 hover:text-primary-500 dark:text-primary-500 dark:hover:text-primary-400">
    @svg('heroicon-s-clipboard-document', 'w-4 h-4', ['style' => 'width: 2rem; height: 2rem;'])
    <span>{{ __('filament-breezy::default.clipboard.link') }}</span>
</a>
