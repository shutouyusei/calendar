<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('予定一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/12 lg:w-8/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="text-center w-full border-collapse">
                        <thead></thead>
                        <tbody>
                            <tr class="hover:bg-gray-50">
                                <td class="py-4 px-6 border-b border-gray-200">
                                    <a href="{{ route('calendar.create') }}" class="text-left text-gray-700 hover:text-gray-900 font-medium">予定を追加</a>
                                </td>
                            </tr>
                            @foreach ($schedules as $schedule)
                            <tr class="hover:bg-gray-50">
                                <td class="py-4 px-6 border-b border-gray-200">
                                    <p class="text-left text-gray-600 text-sm">{{ $schedule->user->name }}</p>
                                    <a href="{{ route('calendar.show', $schedule->id) }}">
                                        <h3 class="text-left font-bold text-lg text-gray-700">{{ $schedule->date }}</h3>
                                        <h3 class="text-left font-bold text-lg text-gray-700">{{ $schedule->title }}</h3>
                                    </a>
                                    <div class="flex">
                                        @if ($schedule->user_id === Auth::user()->id)
                                        <form action="{{ route('calendar.edit', $schedule->id) }}" method="GET" class="text-left">
                                            @csrf
                                            <button type="submit" class="mr-2 ml-2 text-sm hover:bg-gray-200 rounded p-1 focus:outline-none focus:ring focus:ring-gray-300">
                                                <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                        </form>
                                        <form action="{{ route('calendar.destroy', $schedule->id) }}" method="POST" class="text-left">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="mr-2 ml-2 text-sm hover:bg-gray-200 rounded p-1 focus:outline-none focus:ring focus:ring-gray-300">
                                                <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
