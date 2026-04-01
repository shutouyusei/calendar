<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>カレンダー</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline hover:text-gray-900">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline hover:text-gray-900">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline hover:text-gray-900">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <h1 class="text-4xl font-bold text-gray-800">カレンダー</h1>
                </div>

                <div class="mt-8 bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900">スケジュール共有</div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 text-sm">
                                    チームメンバーとスケジュールを共有し、日程の確認や予定の追加が簡単にできます。
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900">カレンダー表示</div>
                            </div>
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 text-sm">
                                    月別カレンダーで予定を一覧表示。予定のある日が一目でわかります。
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-6">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-6 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring ring-gray-300 transition ease-in-out duration-150">
                            ダッシュボードへ
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring ring-gray-300 transition ease-in-out duration-150">
                            ログイン
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 inline-flex items-center px-6 py-3 bg-white border border-gray-300 rounded-md font-semibold text-sm text-gray-700 uppercase tracking-widest hover:bg-gray-50 active:bg-gray-100 focus:outline-none focus:ring ring-gray-300 transition ease-in-out duration-150">
                                登録
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </body>
</html>
