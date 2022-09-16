<!-- resources/views/tweet/edit.blade.php -->

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
          <form class="mb-6" action="{{ route('calendar.update',$schedule->id) }}" method="POST">
            @method('put')
            @csrf
            <div class="flex flex-col mb-4"> 
               <input type='date' name='date' value="{{ $schedule->date }}">
            </div>     
            <div class='flex flex-col mb-4'>
                <input type='text' name='title' placeholder="タイトル" value="{{ $schedule->title }}">
            </div>                    
            <div class="flex flex-col mb-4">
                <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="description">詳細</label>
                    <textarea
                        name='description'
                        rows='3'
                        class="focus:ring-blue-400 focus:border-blue-400 mt-1 block
                        w-full sm:text-sm border border-gray-300 rounded-md p-2"
                        placeholder="詳細を入力"
                      >{{ $schedule->description }}
                    </textarea>
            </div>
            <div class="flex justify-evenly">
              <a href="{{ route('calendar.index') }}" class="block text-center w-5/12 py-3 mt-6 font-medium tracking-widest text-black uppercase bg-gray-100 shadow-sm focus:outline-none hover:bg-gray-200 hover:shadow-none">
                戻る
              </a>
              <button type="submit" class="w-5/12 py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                編集
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>