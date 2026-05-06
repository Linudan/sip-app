<x-filament::page>
    <div>
        @foreach ($this->getRegisteredMyProfileComponents() as $component)
            @unless(is_null($component))
                <div style="margin-bottom: 1.5rem;">
                    @livewire($component)
                </div>
            @endunless
        @endforeach
        <!-- Последний блок не будет иметь отступа -->
        <div style="margin-bottom: 0;"></div>
    </div>
</x-filament::page>
