<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'AllemandExpress') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    <x-nav sticky full-width>
        <x-slot:brand>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
            <div class="font-bold text-xl">AllemandExpress</div>
        </x-slot:brand>
        <x-slot:actions>
            <x-button label="Dashboard" icon="o-home" link="/dashboard" class="btn-ghost btn-sm" responsive />
            <x-button label="Profil" icon="o-user" link="/profile" class="btn-ghost btn-sm" responsive />
            <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="Logout" no-wire-navigate link="/logout" />
        </x-slot:actions>
    </x-nav>

    <x-main with-nav full-width>
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200">
            @if($user = auth()->user())
                <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="pt-2">
                    <x-slot:actions>
                        <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="Logout" no-wire-navigate link="/logout" />
                    </x-slot:actions>
                </x-list-item>
                <x-menu-separator />
            @endif

            <x-menu activate-by-route>
                <x-menu-item title="{{ __('Dashboard') }}" icon="o-home" link="/dashboard" />
                <x-menu-item title="{{ __('My courses') }}" icon="o-academic-cap" link="/my-courses" />
                <x-menu-sub title="{{ __('Settings') }}" icon="o-cog-6-tooth">
                    <x-menu-item title="{{ __('Profile') }}" icon="o-user" link="/profile" />
                    <x-menu-item title="{{ __('Notifications') }}" icon="o-bell" link="/notifications" />
                </x-menu-sub>
            </x-menu>
        </x-slot:sidebar>

        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>

    <x-toast />
</body>
</html>
