<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo Section -->
                <div class="shrink-0 flex items-center group">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <div class="bg-gradient-to-br from-teal-500 to-teal-600 p-2 rounded-xl shadow-lg shadow-teal-100 group-hover:rotate-6 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            </svg>
                        </div>
                        <span class="ms-3 text-xl font-light tracking-tighter text-gray-800 uppercase hidden md:block">
                            Edu<span class="font-black text-teal-600">Flow</span>
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 lg:space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="text-[10px] lg:text-[11px] font-black uppercase tracking-widest focus:text-teal-600">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('students.index')" :active="request()->routeIs('students.*')"
                        class="text-[10px] lg:text-[11px] font-black uppercase tracking-widest">
                        {{ __('Students') }}
                    </x-nav-link>

                    <!-- New: Departments Link -->
                    <x-nav-link :href="route('departments.index')" :active="request()->routeIs('departments.*')"
                        class="text-[10px] lg:text-[11px] font-black uppercase tracking-widest text-gray-400 hover:text-teal-600 transition-all">
                        {{ __('Departments') }}
                    </x-nav-link>

                    <!-- New: Faculty Link -->
                    <x-nav-link :href="route('faculties.index')" :active="request()->routeIs('faculties.*')"
                        class="text-[10px] lg:text-[11px] font-black uppercase tracking-widest text-gray-400 hover:text-teal-600 transition-all">
                        {{ __('Faculty') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 border border-gray-100 text-xs leading-4 font-black rounded-xl text-gray-600 bg-gray-50 hover:bg-teal-50 hover:text-teal-600 focus:outline-none transition-all duration-150 shadow-sm uppercase tracking-widest">
                                <div class="h-7 w-7 rounded-lg bg-gradient-to-tr from-teal-500 to-teal-600 text-white flex items-center justify-center me-2 shadow-md font-black">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>

                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-2 text-[10px] font-black text-gray-400 border-b border-gray-100 uppercase tracking-widest">Account Manager</div>

                            <x-dropdown-link :href="route('profile.edit')" class="hover:bg-teal-50 text-[11px] font-bold">
                                {{ __('Profile Settings') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    class="hover:bg-red-50 text-red-600 text-[11px] font-bold"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out System') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Mobile Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-teal-600 hover:bg-teal-50 focus:outline-none transition duration-150">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-100">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="font-black text-teal-600 uppercase text-[11px] tracking-widest">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('students.index')" :active="request()->routeIs('students.*')" class="font-bold text-[11px] uppercase tracking-widest">
                {{ __('Students List') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('departments.index')" :active="request()->routeIs('departments.*')" class="font-bold text-[11px] uppercase tracking-widest text-gray-500">
                {{ __('Departments') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('faculties.index')" :active="request()->routeIs('faculties.*')" class="font-bold text-[11px] uppercase tracking-widest text-gray-500">
                {{ __('Faculty Members') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200 bg-gray-50">
            <div class="px-4 flex items-center">
                <div class="h-10 w-10 rounded-xl bg-gradient-to-tr from-teal-500 to-teal-600 text-white flex items-center justify-center font-black shadow-lg">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="ms-3">
                    <div class="font-black text-sm text-gray-800 uppercase">{{ Auth::user()->name }}</div>
                    <div class="font-bold text-[10px] text-teal-600 italic tracking-tight">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-[11px] font-bold uppercase">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        class="text-red-600 font-black text-[11px] uppercase"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>