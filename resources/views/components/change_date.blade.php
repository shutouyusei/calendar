<form action="{{ route('dashboard') }}" method="POST" class="inline-flex items-center gap-2">
    @csrf
    <input type="month" name="Mo" value="{{ $date }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm">
    <button type="submit" class="inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring ring-gray-300 transition ease-in-out duration-150">
        変更
    </button>
</form>
