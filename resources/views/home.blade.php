<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SИP — Система инвентаризации и поддержки</title>
    <!-- Шрифт Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Глобальные переменные */
        :root {
            --color-primary: #615FFF;
            --color-primary-dark: #3b3a9e;
            --color-primary-light: #b3b2ff;
            --color-bg-light: #FAFAFA;
            --color-bg-dark: #202024;
            --color-text-light: #1a1a1e;
            --color-text-dark: #f0f0f0;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--color-bg-light);
            color: var(--color-text-light);
            transition: background-color 0.3s, color 0.3s;
        }

        html.dark body {
            background-color: var(--color-bg-dark);
            color: var(--color-text-dark);
        }

        .bg-primary { background-color: var(--color-primary); }
        .bg-primary-dark { background-color: var(--color-primary-dark); }
        .text-primary { color: var(--color-primary); }
        .border-primary { border-color: var(--color-primary); }
        .hover\:bg-primary:hover { background-color: var(--color-primary-dark); }
        .hover\:text-primary:hover { color: var(--color-primary); }
        .hover\:border-primary:hover { border-color: var(--color-primary); }

        .bg-app { background-color: var(--color-bg-light); }
        html.dark .bg-app { background-color: var(--color-bg-dark); }

        .bg-alt { background-color: #f5f5f7; }
        html.dark .bg-alt { background-color: #2a2a30; }

        .text-app { color: var(--color-text-light); }
        html.dark .text-app { color: var(--color-text-dark); }

        .card-bg {
            background-color: #ffffff;
            border-color: #e5e7eb;
        }
        html.dark .card-bg {
            background-color: #3a3a40;
            border-color: #4a4a50;
        }
        html.dark .card-bg:hover {
            border-color: var(--color-primary);
        }

        /* Цвет для подзаголовков в тёмной теме */
        html.dark .section-sub {
            color: #d0d0d0 !important;
        }

        /* Хедер в тёмной теме */
        html.dark header {
            background-color: #1a1a1e !important;
        }

        /* Подзаголовок в тёмной теме */
        html.dark .hero-sub {
            color: #ffffff !important;
        }

        /* Текст "Система инвентаризации..." в шапке */
        html.dark .header-sub {
            color: #e0e0e0 !important;
        }

        /* Ссылка "Войти" в тёмной теме */
        html.dark .login-link {
            color: #e0e0e0 !important;
        }

        /* Текст в карточках (описания) */
        html.dark .card-text {
            color: #d0d0d0 !important;
        }

        .bg-grid-pattern {
            background-image: radial-gradient(rgba(97, 95, 255, 0.1) 1px, transparent 1px);
            background-size: 24px 24px;
        }

        html { scroll-behavior: smooth; }

        .theme-toggle {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            padding: 0.25rem;
            border-radius: 9999px;
            transition: background 0.2s;
        }
        .theme-toggle:hover {
            background: rgba(97, 95, 255, 0.1);
        }
        html.dark .theme-toggle:hover {
            background: rgba(255,255,255,0.1);
        }

        /* Логотип ссылка */
        .logo-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            gap: 0.75rem;
        }
    </style>
</head>
<body class="antialiased bg-app text-app">
    <!-- Шапка -->
    <header class="sticky top-0 z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <a href="/" class="logo-link">
                    <div class="h-8 w-8 bg-primary rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">S</span>
                    </div>
                    <span class="font-semibold text-app text-xl">SИP</span>
                    <span class="text-xs text-gray-500 dark:text-gray-400 ml-2 hidden sm:inline header-sub">Система инвентаризации и поддержки</span>
                </a>
                <div class="flex items-center gap-3">
                    <button id="theme-toggle" class="theme-toggle" aria-label="Переключить тему">
                        <span id="theme-icon">🌙</span>
                    </button>
                    <a href="{{ route('filament.user.auth.login') }}" class="text-sm text-gray-700 dark:text-gray-300 hover:text-primary transition login-link">
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
        <!-- Hero секция -->
        <div class="relative overflow-hidden bg-app">
            <div class="absolute inset-0 bg-grid-pattern opacity-20"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32 relative">
                <div class="text-center max-w-3xl mx-auto">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-app">
                        Управление IT-инфраструктурой
                        <span class="text-primary font-bold"> нового уровня</span>
                    </h1>
                    <p class="mt-6 text-lg text-gray-600 dark:text-gray-400 leading-relaxed hero-sub">
                        Единая система для инвентаризации оборудования, учёта заявок и службы технической поддержки сотрудников Администрации Чебоксарского муниципального округа.
                    </p>
                    <div class="mt-10 flex flex-wrap justify-center gap-4">
                        <a href="{{ route('filament.user.auth.login') }}" class="px-6 py-3 bg-primary hover:bg-primary-dark text-white font-medium rounded-lg shadow-md transition">
                            Начать работу
                        </a>
                        <a href="#features" class="px-6 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-200 font-medium rounded-lg shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            Узнать больше
                        </a>
                        <a href="https://foxium.ru/docs/" target="_blank" class="px-6 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-200 font-medium rounded-lg shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            База знаний
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Секция "Функционал" -->
        <div id="features" class="py-16 bg-alt">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-app">Возможности платформы</h2>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto section-sub">Всё необходимое для IT-отдела и сотрудников</p>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Карточка 1 -->
                    <div class="rounded-xl border border-gray-200 dark:border-gray-700 p-6 card-bg shadow-sm hover:shadow-lg transition">
                        <div class="h-12 w-12 rounded-lg bg-primary/10 dark:bg-primary/20 flex items-center justify-center text-primary">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="mt-4 text-xl font-semibold text-app">Учёт оборудования</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400 card-text">Полная инвентаризация: категории, серийные номера, статусы, история перемещений и QR-коды.</p>
                    </div>
                    <!-- Карточка 2 -->
                    <div class="rounded-xl border border-gray-200 dark:border-gray-700 p-6 card-bg shadow-sm hover:shadow-lg transition">
                        <div class="h-12 w-12 rounded-lg bg-primary/10 dark:bg-primary/20 flex items-center justify-center text-primary">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
</svg>
                        </div>
                        <h3 class="mt-4 text-xl font-semibold text-app">Заявки в техподдержку</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400 card-text">Создание заявок с приоритетом, оценка качества и прикрепление файлов.</p>
                    </div>
                    <!-- Карточка 3 -->
                    <div class="rounded-xl border border-gray-200 dark:border-gray-700 p-6 card-bg shadow-sm hover:shadow-lg transition">
                        <div class="h-12 w-12 rounded-lg bg-primary/10 dark:bg-primary/20 flex items-center justify-center text-primary">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <h3 class="mt-4 text-xl font-semibold text-app">Роли и доступ</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400 card-text">Разграничение прав: сотрудник, IT-специалист. Управление отделами, пользователями и т.д.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Секция "Технологии" -->
        <div class="py-16 bg-app">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-app">Технологический стек</h2>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400 section-sub">Современные инструменты для надёжной работы</p>
                </div>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="https://laravel.com" target="_blank" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 hover:border-primary hover:shadow transition">Laravel 12</a>
                    <a href="https://filamentphp.com" target="_blank" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 hover:border-primary hover:shadow transition">Filament 5</a>
                    <a href="https://livewire.laravel.com" target="_blank" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 hover:border-primary hover:shadow transition">Livewire</a>
                    <a href="https://tailwindcss.com" target="_blank" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 hover:border-primary hover:shadow transition">Tailwind CSS</a>
                    <a href="https://postgresql.org" target="_blank" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 hover:border-primary hover:shadow transition">PostgreSQL</a>
                    <a href="https://spatie.be/docs/laravel-permission" target="_blank" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 hover:border-primary hover:shadow transition">Spatie Permissions</a>
                    <a href="https://squidfunk.github.io/mkdocs-material/" target="_blank" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 hover:border-primary hover:shadow transition">Material for Mkdocs</a>
                </div>
                <div class="text-center mt-8 text-sm text-gray-500 dark:text-gray-400 italic section-sub">
                    ⚡ Проект разработан в рамках дипломной работы
                </div>
            </div>
        </div>

        <!-- Блок "Полезные ссылки" -->
        <div class="py-16 bg-alt">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-app">Полезные ссылки</h2>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400 section-sub">Ресурсы для работы и документации</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- База знаний информ.отдела -->
                    <a href="https://foxium.ru/docs" target="_blank" class="group block p-5 card-bg border border-gray-200 dark:border-gray-700 rounded-xl hover:shadow-lg hover:border-primary transition">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-lg bg-primary/10 dark:bg-primary/20 flex items-center justify-center text-primary group-hover:scale-105 transition">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                            <span class="font-medium text-app">База знаний информ.отдела</span>
                        </div>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 card-text">Документация, инструкции, руководства</p>
                    </a>
                    <!-- Чебоксарский институт (филиал) Московского политеха -->
                    <a href="https://www.polytech21.ru/" target="_blank" class="group block p-5 card-bg border border-gray-200 dark:border-gray-700 rounded-xl hover:shadow-lg hover:border-primary transition">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-lg bg-primary/10 dark:bg-primary/20 flex items-center justify-center text-primary group-hover:scale-105 transition">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <span class="font-medium text-app">Чебоксарский институт (филиал) МПУ</span>
                        </div>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 card-text">Официальный сайт вуза</p>
                    </a>
                    <!-- Официальный сайт администрации -->
                    <a href="https://chebs.cap.ru/" target="_blank" class="group block p-5 card-bg border border-gray-200 dark:border-gray-700 rounded-xl hover:shadow-lg hover:border-primary transition">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-lg bg-primary/10 dark:bg-primary/20 flex items-center justify-center text-primary group-hover:scale-105 transition">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            </div>
                            <span class="font-medium text-app">Администрация Чебоксарского района</span>
                        </div>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 card-text">Официальный портал</p>
                    </a>
                    <!-- Официальный сайт минцифры РФ -->
                    <a href="https://digital.gov.ru/" target="_blank" class="group block p-5 card-bg border border-gray-200 dark:border-gray-700 rounded-xl hover:shadow-lg hover:border-primary transition">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-lg bg-primary/10 dark:bg-primary/20 flex items-center justify-center text-primary group-hover:scale-105 transition">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.905-3.905 10.237-3.905 14.142 0M3.879 10.586c5.466-5.466 14.262-5.466 19.728 0"></path></svg>
                            </div>
                            <span class="font-medium text-app">Минцифры РФ</span>
                        </div>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 card-text">Официальный сайт</p>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Футер -->
    <footer class="py-8 bg-app">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-sm text-gray-500 dark:text-gray-400">
                &copy; {{ date('Y') }} SИP — Система инвентаризации и поддержки Администрации Чебоксарского муниципального округа
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.getElementById('theme-toggle');
            const icon = document.getElementById('theme-icon');
            const html = document.documentElement;

            const currentTheme = localStorage.getItem('theme') || 'light';
            if (currentTheme === 'dark') {
                html.classList.add('dark');
                icon.textContent = '☀️';
            } else {
                html.classList.remove('dark');
                icon.textContent = '🌙';
            }

            toggle.addEventListener('click', function() {
                const isDark = html.classList.toggle('dark');
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
                icon.textContent = isDark ? '☀️' : '🌙';
            });
        });
    </script>
</body>
</html>
