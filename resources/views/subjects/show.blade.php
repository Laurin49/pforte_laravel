<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ 'Show Subject' }}
        </h2>
    </x-slot>
    <div class="font-sans antialiased">
        <div class="flex flex-col items-center pt-6 bg-gray-100 sm:justify-start sm:pt-0 min-h-fit">
            <div class="w-full px-16 py-20 mt-4 overflow-hidden bg-white rounded-lg lg:max-w-5xl">
                <div class="flex justify-between w-full mb-6">
                    <div class="flex items-center justify-start ">
                        <h1 class="font-serif text-3xl font-bold">Show Subject</h1>
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ URL::previous() }}" class="px-4 py-2 bg-gray-500 rounded-md text-sky-100 hover:bg-gray-600">
                            <- Back
                        </a>
                    </div>
                </div>
                <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                    {{ $subject->name }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>