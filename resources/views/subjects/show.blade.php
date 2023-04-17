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
                    {{ $subject->titel }}
                </div>
                <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                    {{ $subject->name }}
                </div>
                @isset($subject->subtitel)
                    <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                        {{ $subject->subtitel }}
                    </div>
                @endisset
                @isset($subject->stichpunkte)
                    <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                        {{ $subject->stichpunkte }}
                    </div>
                @endisset
                {{-- Accordion --}}
                <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10"
                    x-data="{ 
                        beschreibung: true,
                        kosten: false,
                        activeClass: 'bg-indigo-800 focus:outline-none',
                    }">
                    <div class="mb-4">
                        <div @click="beschreibung = ! beschreibung"
                          :class="beschreibung === true ? activeClass : ''"
                          class="flex items-center justify-between w-full py-3 pl-3 pr-2 font-bold text-indigo-100 bg-indigo-500 rounded cursor-pointer hover:text-indigo-100"
                        >
                          Beschreibung
                          <span class="flex items-center justify-center w-6 h-6">
                            <svg :class="beschreibung === true ? 'block' : 'hidden'"
                              class="w-3 h-3 fill-current" viewBox="0 -192 469.33333 469" xmlns="http://www.w3.org/2000/svg">
                              <path d="m437.332031.167969h-405.332031c-17.664062 0-32 14.335937-32 32v21.332031c0 17.664062 14.335938 32 32 32h405.332031c17.664063 0 32-14.335938 32-32v-21.332031c0-17.664063-14.335937-32-32-32zm0 0" />
                            </svg>
                            <svg :class="beschreibung === false ? 'block' : 'hidden'"
                              class="w-3 h-3 fill-current" viewBox="0 0 469.33333 469.33333" xmlns="http://www.w3.org/2000/svg">
                              <path d="m437.332031 192h-160v-160c0-17.664062-14.335937-32-32-32h-21.332031c-17.664062 0-32 14.335938-32 32v160h-160c-17.664062 0-32 14.335938-32 32v21.332031c0 17.664063 14.335938 32 32 32h160v160c0 17.664063 14.335938 32 32 32h21.332031c17.664063 0 32-14.335937 32-32v-160h160c17.664063 0 32-14.335937 32-32v-21.332031c0-17.664062-14.335937-32-32-32zm0 0" />
                          </span>
                        </div>
                        <div x-show="beschreibung" x-collapse>
                          <p class="text-gray-600">
                            <textarea name="beschreibung"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                rows="10" placeholder="400">{{ $subject->beschreibung }}</textarea>
                          </p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div
                          @click="kosten = ! kosten"
                          :class="kosten === true ? activeClass : ''"
                          class="flex items-center justify-between w-full py-3 pl-3 pr-2 font-bold text-indigo-100 bg-indigo-500 rounded cursor-pointer hover:text-indigo-100"
                        >
                          Kosten / Kostenträger
                          <span class="flex items-center justify-center w-6 h-6">
                            <svg :class="kosten === true ? 'block' : 'hidden'"
                              class="w-3 h-3 fill-current" viewBox="0 -192 469.33333 469" xmlns="http://www.w3.org/2000/svg">
                              <path d="m437.332031.167969h-405.332031c-17.664062 0-32 14.335937-32 32v21.332031c0 17.664062 14.335938 32 32 32h405.332031c17.664063 0 32-14.335938 32-32v-21.332031c0-17.664063-14.335937-32-32-32zm0 0"/>
                            </svg>
                            <svg :class="kosten === false ? 'block' : 'hidden'"                            
                              class="w-3 h-3 fill-current" viewBox="0 0 469.33333 469.33333" xmlns="http://www.w3.org/2000/svg">
                              <path d="m437.332031 192h-160v-160c0-17.664062-14.335937-32-32-32h-21.332031c-17.664062 0-32 14.335938-32 32v160h-160c-17.664062 0-32 14.335938-32 32v21.332031c0 17.664063 14.335938 32 32 32h160v160c0 17.664063 14.335938 32 32 32h21.332031c17.664063 0 32-14.335937 32-32v-160h160c17.664063 0 32-14.335937 32-32v-21.332031c0-17.664062-14.335937-32-32-32zm0 0"/>
                          </span>
                        </div>
                        <div x-show="kosten" x-collapse.duration.500ms>
                          <p class="text-gray-600">
                            <textarea name="beschreibung"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                rows="10" placeholder="400">{{ $subject->kosten }}</textarea>
                          </p>
                        </div>
                    </div>
                      
                </div>
            </div>
        </div>
    </div>
</x-app-layout>