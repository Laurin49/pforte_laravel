<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (Auth::check())
                        <h1 class="font-medium text-1xl">Erfolgreich eingescheckt !</h1>
                    @endif
                    @if (Auth::guest())
                        <h1 class="font-medium text-1xl">Als Gast haben Sie nur eingeschränkten zugang. Bitte einloggen !</h1>
                    @endif
                    @if (Auth::user()->isAdmin)
                        <div class="font-serif text-2xl text-red-500">Als Admin eingeloggt.</div>
                    @else
                        <div class="font-serif text-2xl text-red-500">Als User eingeloggt.</div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
