<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex justify-end">
            <x-filament::button
                x-data="{}"
                x-on:click="$dispatch('open-modal', { id: 'qr-scanner-modal' })"
                icon="heroicon-o-qr-code"
            >
                Сканировать QR-код
            </x-filament::button>
        </div>

        <x-filament::modal id="qr-scanner-modal" width="md">
            <x-slot name="heading">
                Сканирование QR-кода
            </x-slot>

            <div id="qr-reader" style="width: 100%;"></div>

            <x-slot name="footerActions">
                <x-filament::button
                    x-on:click="$dispatch('close-modal', { id: 'qr-scanner-modal' })"
                    color="gray"
                >
                    Закрыть
                </x-filament::button>
            </x-slot>
        </x-filament::modal>
    </x-filament::section>
</x-filament-widgets::widget>

@push('scripts')
<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
<script>
    document.addEventListener('livewire:init', () => {
        let html5QrCode = null;

        const openModalHandler = () => {
            const qrReader = document.getElementById('qr-reader');
            if (qrReader && !html5QrCode) {
                html5QrCode = new Html5Qrcode("qr-reader");
                const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                    // Останавливаем сканер после успешного чтения
                    if (html5QrCode) {
                        html5QrCode.stop().then(() => {
                            html5QrCode = null;
                        }).catch(err => console.error(err));
                    }
                    // Вызываем метод Livewire компонента
                    @this.call('processScan', decodedText);
                    // Закрываем модальное окно
                    window.dispatchEvent(new CustomEvent('close-modal', { detail: { id: 'qr-scanner-modal' } }));
                };
                const config = { fps: 10, qrbox: { width: 250, height: 250 } };
                html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
            }
        };

        const closeModalHandler = () => {
            if (html5QrCode) {
                html5QrCode.stop().then(() => {
                    html5QrCode = null;
                }).catch(err => console.error(err));
            }
        };

        window.addEventListener('open-modal', (event) => {
            if (event.detail.id === 'qr-scanner-modal') {
                setTimeout(openModalHandler, 100);
            }
        });

        window.addEventListener('close-modal', (event) => {
            if (event.detail.id === 'qr-scanner-modal') {
                closeModalHandler();
            }
        });
    });
</script>
@endpush
