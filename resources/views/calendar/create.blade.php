<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('予定を追加') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('calendar.store') }}" method='POST'>
                        @csrf   
                        <div class="flex flex-col mb-4">
                            <input type='date' name='date'>
                        </div>      
                        <div class='flex flex-col mb-4'>
                            <input type='text' name='title' placeholder="タイトル">
                        </div>                    
                        <div class="flex flex-col mb-4">
                            <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="description">詳細</label>
                                <textarea
                                name='description'
                                rows='3'
                                class="focus:ring-blue-400 focus:border-blue-400 mt-1 block
                                w-full sm:text-sm border border-gray-300 rounded-md p-2"
                                placeholder="詳細を入力"></textarea>
                        </div>
                    <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                        予定を追加
                </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>