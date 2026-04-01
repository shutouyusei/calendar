<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('予定を編集する') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('common.errors')
                    <form class="mb-6" action="{{ route('calendar.update', $schedule->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="flex flex-col mb-4">
                            <label class="mb-2 font-bold text-sm text-gray-700" for="date">日付</label>
                            <input type="date" name="date" id="date" value="{{ $schedule->date }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="flex flex-col mb-4">
                            <label class="mb-2 font-bold text-sm text-gray-700" for="title">タイトル</label>
                            <input type="text" name="title" id="title" placeholder="タイトル" value="{{ $schedule->title }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="flex flex-col mb-4">
                            <label class="mb-2 font-bold text-sm text-gray-700" for="description">詳細</label>
                            <textarea name="description" id="description" rows="3" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="詳細を入力">{{ $schedule->description }}</textarea>
                        </div>
                        <div class="flex justify-evenly">
                            <a href="{{ route('calendar.index') }}" class="block text-center w-5/12 py-3 mt-6 font-medium tracking-widest text-gray-700 uppercase bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring ring-gray-300 hover:bg-gray-50 transition ease-in-out duration-150">
                                戻る
                            </a>
                            <button type="submit" class="w-5/12 py-3 mt-6 font-medium tracking-widest text-white uppercase bg-gray-800 rounded-md shadow-lg focus:outline-none focus:ring ring-gray-300 hover:bg-gray-700 transition ease-in-out duration-150">
                                編集
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
