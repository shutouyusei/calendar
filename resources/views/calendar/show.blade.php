<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-gray-900">{{ $schedule->date }}</p>
                            <p class="mb-2 uppercase font-bold text-lg text-gray-900">タイトル</p>
                            <p class="py-2 px-3 text-gray-900" id="title">
                                {{ $schedule->title }}
                            </p>
                        </div>
                        <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-gray-900">詳細</p>
                            <p class="py-2 px-3 text-gray-900" id="description">
                                {{ $schedule->description }}
                            </p>
                        </div>
                        <a href="{{ route('calendar.index') }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-gray-800 rounded-md shadow-lg focus:outline-none focus:ring ring-gray-300 hover:bg-gray-700 transition ease-in-out duration-150">
                            戻る
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
