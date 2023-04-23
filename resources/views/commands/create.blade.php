<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ 'Neue Anweisung' }}
        </h2>
    </x-slot>
    <div class="font-sans antialiased">
        <div class="flex flex-col items-center pt-4 bg-gray-100 sm:justify-start sm:pt-0 min-h-fit">
            <div class="w-full px-16 py-8 mt-4 mb-4 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
                <div class="flex justify-end mb-4">
                    <a href="{{ route('commands.index') }}"
                        class="px-4 py-2 bg-gray-500 rounded-md text-sky-100 hover:bg-gray-600">
                        <- Zurück
                    </a>
                </div>
                <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                    <form action="{{ route('commands.index') }}" method="POST">
                        @csrf
                        <!-- Name -->
                        <div class="mb-2">
                            <label class="block text-sm font-medium text-gray-700" for="name">
                                Name
                            </label>
                            <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-sm text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <!-- Beschreibung -->
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700" for="beschreibung">
                                Beschreibung
                            </label>
                            <textarea name="beschreibung"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                rows="8" placeholder="400">{{ old('beschreibung') }}</textarea>
                            @error('beschreibung')
                                <span class="text-sm text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="flex flex-row space-x-4">
                            {{-- Monat --}}
                            <div class="mt-4 mb-6">
                                <label class="block text-sm font-medium text-gray-700" for="monat">
                                    <span class=""> Monat: </span>
                                    <select class="block w-full mt-1" name="monat">
                                        @foreach (range(1, 12) as $month)
                                            <option value="{{ $month }}">
                                                {{ date('M', strtotime('2023-' . $month)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            {{-- Jahr --}}
                            <div class="mt-4 mb-6">
                                <label class="block text-sm font-medium text-gray-700" for="jahr">
                                    <span class=""> Jahr: </span>
                                    <select class="block w-full mt-1" name="jahr">
                                        @for ($jahr = date('Y'); $jahr > date('Y') - 6; $jahr--)
                                            <option value="{{ $jahr }}">
                                                {{ $jahr }}
                                            </option>
                                        @endfor
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="flex items-center justify-start mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-6 py-2 text-sm font-semibold rounded-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                                Speichern
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
