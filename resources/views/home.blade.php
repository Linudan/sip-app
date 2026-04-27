<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SИP — Система инвентаризации и поддержки</title>
    <!-- Шрифт Montserrat как в панели Filament -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        .bg-grid-pattern {
            background-image: radial-gradient(rgba(99, 102, 241, 0.1) 1px, transparent 1px);
            background-size: 24px 24px;
        }
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 antialiased">
    <!-- Шапка -->
    <header class="sticky top-0 z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <div class="h-8 w-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">S</span>
                    </div>
                    <span class="font-semibold text-gray-900 dark:text-white text-xl">SИP</span>
                    <span class="text-xs text-gray-500 dark:text-gray-400 ml-2 hidden sm:inline">Система инвентаризации и поддержки</span>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('filament.user.auth.login') }}" class="text-sm text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                        Войти
                    </a>
                    <a href="{{ route('filament.user.auth.register') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                        Регистрация
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- Герой секция -->
        <div class="relative overflow-hidden bg-gradient-to-br from-white via-indigo-50/30 to-white dark:from-gray-900 dark:via-indigo-950/20 dark:to-gray-900">
            <div class="absolute inset-0 bg-grid-pattern opacity-20"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32 relative">
                <div class="text-center max-w-3xl mx-auto">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                        Управление IT-инфраструктурой
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600"> нового уровня</span>
                    </h1>
                    <p class="mt-6 text-lg text-gray-600 dark:text-gray-400 leading-relaxed">
                        Единая платформа для инвентаризации оборудования, учёта заявок и технической поддержки сотрудников Администрации Чебоксарского муниципального округа.
                    </p>
                    <div class="mt-10 flex flex-wrap justify-center gap-4">
                        <a href="#" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-md transition">
                            Начать работу
                        </a>
                        <a href="#features" class="px-6 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-200 font-medium rounded-lg shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            Узнать больше
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Секция "Функционал" -->
        <div id="features" class="py-16 bg-white dark:bg-gray-900 border-y border-gray-100 dark:border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Возможности платформы</h2>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">Всё необходимое для IT-отдела и сотрудников</p>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Карточка 1 -->
                    <div class="rounded-xl border border-gray-200 dark:border-gray-700 p-6 bg-gray-50 dark:bg-gray-800/50 shadow-sm hover:shadow-lg transition">
                        <div class="h-12 w-12 rounded-lg bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center text-indigo-600 dark:text-indigo-400">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="mt-4 text-xl font-semibold text-gray-900 dark:text-white">Учёт оборудования</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Полная инвентаризация: категории, серийные номера, статусы, история перемещений и QR-коды.</p>
                    </div>
                    <!-- Карточка 2 -->
                    <div class="rounded-xl border border-gray-200 dark:border-gray-700 p-6 bg-gray-50 dark:bg-gray-800/50 shadow-sm hover:shadow-lg transition">
                        <div class="h-12 w-12 rounded-lg bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center text-indigo-600 dark:text-indigo-400">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 00-4 4v3a4 4 0 004 4m-5-7h3m-6 0h3"></path></svg>
                        </div>
                        <h3 class="mt-4 text-xl font-semibold text-gray-900 dark:text-white">Заявки в техподдержку</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Создание заявок с приоритетом, оценка качества, прикрепление файлов и интеграция с мессенджерами.</p>
                    </div>
                    <!-- Карточка 3 -->
                    <div class="rounded-xl border border-gray-200 dark:border-gray-700 p-6 bg-gray-50 dark:bg-gray-800/50 shadow-sm hover:shadow-lg transition">
                        <div class="h-12 w-12 rounded-lg bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center text-indigo-600 dark:text-indigo-400">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <h3 class="mt-4 text-xl font-semibold text-gray-900 dark:text-white">Роли и доступ</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Разграничение прав: сотрудник, IT-специалист, администратор. Управление отделами и приглашения.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Секция "Технологии" -->
        <div class="py-16 bg-gray-50 dark:bg-gray-800/30">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Технологический стек</h2>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">Современные инструменты для надёжной работы</p>
                </div>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="https://laravel.com" target="_blank" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 hover:border-indigo-300 dark:hover:border-indigo-700 hover:shadow transition">Laravel 12</a>
                    <a href="https://filamentphp.com" target="_blank" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 hover:border-indigo-300 dark:hover:border-indigo-700 hover:shadow transition">Filament 5</a>
                    <a href="https://livewire.laravel.com" target="_blank" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 hover:border-indigo-300 dark:hover:border-indigo-700 hover:shadow transition">Livewire</a>
                    <a href="https://tailwindcss.com" target="_blank" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 hover:border-indigo-300 dark:hover:border-indigo-700 hover:shadow transition">Tailwind CSS</a>
                    <a href="https://postgresql.org" target="_blank" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 hover:border-indigo-300 dark:hover:border-indigo-700 hover:shadow transition">PostgreSQL</a>
                    <a href="https://spatie.be/docs/laravel-permission" target="_blank" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 hover:border-indigo-300 dark:hover:border-indigo-700 hover:shadow transition">Spatie Permissions</a>
                    <a href="https://squidfunk.github.io/mkdocs-material/" target="_blank" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 hover:border-indigo-300 dark:hover:border-indigo-700 hover:shadow transition">Material for Mkdocs</a>
                </div>
                <div class="text-center mt-8 text-sm text-gray-500 dark:text-gray-400 italic">
                    ⚡ Проект разработан в рамках дипломной работы
                </div>
            </div>
        </div>

        <!-- Блок "Полезные ссылки" (карточки) -->
        <div class="py-16 bg-white dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Полезные ссылки</h2>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">Ресурсы для работы и документации</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- База знаний информ.отдела -->
                    <a href="#" target="_blank" class="group block p-5 bg-gray-50 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-700 rounded-xl hover:shadow-lg hover:border-indigo-200 dark:hover:border-indigo-800 transition">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-lg bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 dark:text-indigo-400 group-hover:scale-105 transition">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                            <span class="font-medium text-gray-800 dark:text-gray-200">База знаний информ.отдела</span>
                        </div>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Документация, инструкции, руководства</p>
                    </a>
                    <!-- Чебоксарский институт (филиал) Московского политеха -->
                    <a href="https://www.polytech21.ru/" target="_blank" class="group block p-5 bg-gray-50 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-700 rounded-xl hover:shadow-lg hover:border-indigo-200 dark:hover:border-indigo-800 transition">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-lg bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 dark:text-indigo-400 group-hover:scale-105 transition">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <span class="font-medium text-gray-800 dark:text-gray-200">Чебоксарский институт (филиал) МПУ</span>
                        </div>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Официальный сайт вуза</p>
                    </a>
                    <!-- Официальный сайт администрации -->
                    <a href="https://chebs.cap.ru/" target="_blank" class="group block p-5 bg-gray-50 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-700 rounded-xl hover:shadow-lg hover:border-indigo-200 dark:hover:border-indigo-800 transition">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-lg bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 dark:text-indigo-400 group-hover:scale-105 transition">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            </div>
                            <span class="font-medium text-gray-800 dark:text-gray-200">Администрация Чебоксарского района</span>
                        </div>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Официальный портал</p>
                    </a>
                    <!-- Официальный сайт минцифры РФ -->
                    <a href="https://digital.gov.ru/" target="_blank" class="group block p-5 bg-gray-50 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-700 rounded-xl hover:shadow-lg hover:border-indigo-200 dark:hover:border-indigo-800 transition">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-lg bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 dark:text-indigo-400 group-hover:scale-105 transition">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.905-3.905 10.237-3.905 14.142 0M3.879 10.586c5.466-5.466 14.262-5.466 19.728 0"></path></svg>
                            </div>
                            <span class="font-medium text-gray-800 dark:text-gray-200">Минцифры РФ</span>
                        </div>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Официальный сайт</p>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer class="border-t border-gray-200 dark:border-gray-800 py-8 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-sm text-gray-500 dark:text-gray-400">
                &copy; {{ date('Y') }} SИP — Система инвентаризации и поддержки Администрации Чебоксарского муниципального округа
            </div>
        </div>
    </footer>
</body>
</html>
