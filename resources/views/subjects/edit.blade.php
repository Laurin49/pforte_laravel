<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ 'Edit Subject' }}
        </h2>
    </x-slot>
    <div class="font-sans antialiased">
        <div class="flex flex-col items-center pt-6 bg-gray-100 sm:justify-start sm:pt-0 min-h-fit">
            <div class="w-full px-16 py-20 mt-4 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
                <div class="flex justify-between w-full mb-6">
                    <div class="flex items-center justify-start ">
                        <h1 class="font-serif text-3xl font-bold">Edit Subject</h1>
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ URL::previous() }}" class="px-4 py-2 bg-gray-500 rounded-md text-sky-100 hover:bg-gray-600">
                            <- Back
                        </a>
                    </div>
                </div>
                <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="name">
                                Name
                            </label>
                            <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" name="name" value="{{old('name', $subject->name)}}">
                            @error('name')
                            <span class="text-sm text-red-600">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <!-- Titel -->
                        <div class="mt-4"
                            <label class="block text-sm font-medium text-gray-700" for="titel">
                                Titel
                            </label>
                            <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" name="titel" value="{{old('titel', $subject->titel)}}">
                            @error('titel')
                            <span class="text-sm text-red-600">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <!-- Stichpunkte -->
                        <div class="mt-4"
                            <label class="block text-sm font-medium text-gray-700" for="stichpunkte">
                                Stichpunkte
                            </label>
                            <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" name="stichpunkte" value="{{old('stichpunkte', $subject->stichpunkte)}}">
                            @error('stichpunkte')
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
                                rows="4" placeholder="400"> {{old('beschreibung', $subject->beschreibung)}}</textarea>
                            @error('beschreibung')
                            <span class="text-sm text-red-600">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <!-- Kosten -->
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700" for="kosten">
                                Kosten
                            </label>
                            <textarea name="kosten"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                rows="4" placeholder="400"> {{old('kosten', $subject->kosten)}}</textarea>
                            @error('kosten')
                            <span class="text-sm text-red-600">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        {{-- Category --}}
                        <div class="mt-4 mb-6">
                            <label class="block text-sm font-medium text-gray-700" for="category_id">
                                <span class=""> Category: </span>
                                <select class="block w-full mt-1" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $subject->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="flex items-center justify-start mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-6 py-2 text-sm font-semibold rounded-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>