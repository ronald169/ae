<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    {{-- Flatpickr  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('styles')
</head>
<body class="min-h-screen font-sans antialiased bg-base-200">

    {{-- Simple navbar for guest pages --}}
    <div class="navbar bg-base-100 shadow-sm sticky top-0 z-10">
        <div class="flex-1">
            <a href="{{ route('home') }}" class="text-xl font-bold text-primary">🇩🇪 AllemandExpress</a>
        </div>
        <div class="flex-none">
            <!-- Language Switcher -->
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-sm">
                    <x-icon name="o-language" class="h-5 w-5" />
                    <span class="ml-1 hidden sm:inline">{{ strtoupper(app()->getLocale()) }}</span>
                </label>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="{{ route('language.switch', 'en') }}" class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">🇬🇧 English</a></li>
                    <li><a href="{{ route('language.switch', 'fr') }}" class="{{ app()->getLocale() === 'fr' ? 'active' : '' }}">🇫🇷 Français</a></li>
                    <li><a href="{{ route('language.switch', 'de') }}" class="{{ app()->getLocale() === 'de' ? 'active' : '' }}">🇩🇪 Deutsch</a></li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Main content --}}
    <main class="min-h-[calc(100vh-64px)]">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="footer footer-center p-4 bg-base-200 text-base-content/60 text-xs">
        <div>
            <p>&copy; {{ date('Y') }} AllemandExpress - {{ __('Learn German Online') }}</p>
        </div>
    </footer>

    <x-toast />
    @livewireScripts
    @stack('scripts')
</body>
</html>
