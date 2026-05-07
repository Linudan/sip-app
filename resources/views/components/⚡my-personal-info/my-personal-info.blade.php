<x-filament::section :aside="true" :heading="__('Личная информация')" :description="__('Управление вашими личными данными и контактами')">
    <form wire:submit.prevent="submit" class="space-y-6">
        {{ $this->form }}
        <div class="text-right">
            <x-filament::button type="submit">
                {{ __('Обновить') }}
            </x-filament::button>
        </div>
    </form>
</x-filament::section>
