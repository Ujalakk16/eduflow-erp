<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EduFlow | Management System</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <span class="px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest shadow-sm border
                {{ auth()->user()->role == 'admin' ? 'bg-red-50 text-red-600 border-red-100' : 'bg-green-50 text-green-600 border-green-100' }}">
                {{ auth()->user()->role == 'admin' ? 'Authorized Admin' : 'System User' }}
            </span>
        </div>

        @isset($header)
        <header class="bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-40">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <main>
            {{ $slot }}
        </main>
        
        <footer class="mt-20 pb-12 border-t border-gray-100 bg-white">
            <div class="max-w-7xl mx-auto px-4 pt-12">
                <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                    
                    <div class="flex flex-col items-center md:items-start">
                        <div class="flex items-center">
                            <div class="bg-gradient-to-br from-teal-500 to-teal-600 p-2 rounded-xl mr-3 shadow-lg shadow-teal-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                </svg>
                            </div>
                            <span class="text-xl font-light text-gray-800 tracking-tighter">
                                Edu<span class="font-black text-teal-600">Flow</span>
                            </span>
                        </div>
                        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest mt-2 ml-1">Developed by Ujala Liaquat Ali</p>
                    </div>

                    <div class="flex items-center bg-gray-50 border border-gray-100 px-5 py-2.5 rounded-2xl shadow-inner">
                        <span class="relative flex h-2 w-2 mr-3">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                        </span>
                        <span class="text-[9px] font-black text-gray-600 uppercase tracking-[0.2em]">EduFlow System Live</span>
                    </div>

                    <div class="text-center md:text-right">
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-tight">
                            © {{ date('Y') }} EduFlow Platform<br>
                            <span class="text-teal-600 font-bold uppercase tracking-tighter text-[8px]">Proprietary Education Analytics</span>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>