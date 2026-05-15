<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduFlow </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .nav-link-active {
            color: #0d9488 !important;
            background-color: #f0fdfa;
            border-radius: 12px;
        }
        /* Mobile scrollbar hide */
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>

<body class="bg-[#f8fafc] text-[#1e293b] min-h-screen flex flex-col">

<header class="bg-white border-b border-gray-100 px-4 md:px-10 flex justify-between items-center h-20 sticky top-0 z-50 shadow-sm">
    
    <div class="flex items-center space-x-4 md:space-x-12 h-full overflow-hidden">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 shrink-0 group">
            <div class="bg-gradient-to-br from-teal-500 to-teal-600 p-2 rounded-xl shadow-lg shadow-teal-600/20 group-hover:rotate-6 transition-all">
                <i class="fas fa-graduation-cap text-white text-sm md:text-base"></i>
            </div>
            <span class="text-base md:text-xl font-light text-gray-800 uppercase tracking-tighter">
                Edu<span class="font-black text-teal-600">Flow</span>
            </span>
        </a>

        <nav class="flex items-center space-x-2 md:space-x-4 h-full overflow-x-auto no-scrollbar whitespace-nowrap py-1">
            <a href="{{ route('dashboard') }}" 
               class="px-4 py-2 flex items-center text-[10px] md:text-[11px] font-black uppercase tracking-widest transition-all {{ request()->routeIs('dashboard') ? 'nav-link-active text-teal-600' : 'text-gray-400 hover:text-teal-600' }}">
                Dashboard
            </a>
            <a href="{{ route('students.index') }}" 
               class="px-4 py-2 flex items-center text-[10px] md:text-[11px] font-black uppercase tracking-widest transition-all {{ request()->routeIs('students.*') ? 'nav-link-active text-teal-600' : 'text-gray-400 hover:text-teal-600' }}">
                Students
            </a>
            <a href="{{ route('teachers.index') }}" 
               class="px-4 py-2 flex items-center text-[10px] md:text-[11px] font-black uppercase tracking-widest transition-all {{ request()->routeIs('teachers.*') ? 'nav-link-active text-teal-600' : 'text-gray-400 hover:text-teal-600' }}">
                Teachers
            </a>
            <a href="{{ route('attendance.index') }}" 
               class="px-4 py-2 flex items-center text-[10px] md:text-[11px] font-black uppercase tracking-widest transition-all {{ request()->routeIs('attendance.*') ? 'nav-link-active text-teal-600' : 'text-gray-400 hover:text-teal-600' }}">
                Attendance
            </a>
        </nav>
    </div>

  <!-- Is hissay ko apni file mein dhoondo aur replace kardo -->
<div class="flex items-center space-x-2 md:space-x-6 shrink-0 ml-2">
    <a href="{{ route('profile.edit') }}" class="flex items-center bg-gray-50 p-1 md:px-4 md:py-2 rounded-xl border border-gray-100 hover:bg-teal-50 transition-all shadow-sm">
        <div class="text-right hidden lg:block">
            
    <!-- User ka dynamic naam -->
    <p class="text-[11px] font-black text-gray-800 uppercase tracking-tighter">
        {{ auth()->user()->role== 'admin' ? 'Admin: ' : 'User: ' }}{{ auth()->user()->name }}
    </p>
    
    <!-- Role base label: Agar admin hai toh Administrator, warna User -->
    <p class="text-[8px] font-bold text-teal-600 uppercase tracking-widest">
        @if(auth()->user()->role == 'admin')
            Administrator
        @else
            User Account
        @endif
    </p>
</div>
        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0d9488&color=ffffff&bold=true" 
             class="h-8 w-8 md:h-9 md:w-9 rounded-lg border-2 border-white shadow-sm">
    </a>

    <form method="POST" action="{{ route('logout') }}" class="flex items-center">
        @csrf
        <button type="submit" class="p-2 text-gray-300 hover:text-red-500 transition-colors">
            <i class="fas fa-power-off text-sm md:text-lg"></i>
        </button>
    </form>
</div>
</header>

<main class="flex-grow p-4 md:p-10 max-w-[1600px] mx-auto w-full">
    {{ $slot }}
</main>
<footer class="mt-auto border-t border-gray-100 bg-white w-full">
    <!-- Dashboard ki alignment se match karne ke liye max-width -->
    <div class="max-w-7xl mx-auto px-6 py-4 md:py-6">
        
        <!-- Mobile: Side-by-side | PC: Wide Row -->
        <div class="grid grid-cols-2 md:flex md:flex-row md:justify-between items-center gap-y-4">
            
            <!-- Left Side: Brand Identity -->
            <div class="flex flex-col items-start shrink-0">
                <div class="flex items-center mb-0.5">
                    <div class="bg-teal-600 p-1.5 rounded-lg mr-2 shadow-sm">
                        <i class="fas fa-graduation-cap text-white text-[10px]"></i>
                    </div>
                    <span class="text-base md:text-lg font-light text-gray-800 uppercase tracking-tighter">
                        Edu<span class="font-black text-teal-600">Flow</span>
                    </span>
                </div>
                <p class="text-[8px] md:text-[9px] font-black text-gray-400 uppercase tracking-widest leading-none">
                    Advanced Learning Management
                </p>
            </div>

            <!-- Right Side: Copyright & Dev (Mobile par right, PC par end) -->
            <div class="flex flex-col items-end shrink-0">
                <p class="text-[9px] md:text-[10px] font-black text-gray-800 uppercase tracking-widest mb-1">
                    © {{ date('Y') }} EduFlow
                </p>
                <div class="flex items-center">
                    <span class="hidden md:block h-[1px] w-3 bg-teal-200 mr-2"></span>
                    <p class="text-[8px] md:text-[9px] font-black text-teal-600 uppercase tracking-widest">
                        Dev. Ujala Liaquat Ali
                    </p>
                </div>
            </div>

        </div>
    </div>
</footer>

</body>
</html>