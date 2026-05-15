<x-admin>
    <div class="px-4 py-6 sm:px-6 lg:px-8 max-w-7xl mx-auto text-[#1e293b]"> 
        
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-10 gap-4">
            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-br from-teal-500 to-teal-600 p-2.5 rounded-2xl shadow-lg shadow-teal-100">
                    <i class="fas fa-graduation-cap text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-light uppercase tracking-tighter">
                        Edu<span class="font-black text-teal-600">Flow</span>
                    </h1>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-1">Management & Analytics</p>
                </div>
            </div>

            <div class="inline-flex items-center bg-white px-4 py-2 rounded-2xl border border-gray-100 shadow-sm self-start sm:self-center">
                <span class="relative flex h-2 w-2 mr-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                </span>
                <span class="text-[9px] font-black text-gray-500 uppercase tracking-widest">
                    Active Session {{ date('Y') }} - {{ date('Y') + 1 }}
                </span>
            </div>
        </div>

        <!-- Dashboard Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"> 
            
            <!-- 1. Students (Sub ko nazar ayega) -->
            <a href="{{ route('students.index') }}" class="group block transition-all duration-300 active:scale-95">
                <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 border-l-4 border-blue-500 group-hover:shadow-xl group-hover:border-blue-200 transition-all h-full">
                    <h2 class="text-gray-400 uppercase text-[10px] font-black tracking-[0.2em] group-hover:text-blue-500 transition-colors">Total Students</h2>
                    <div class="flex items-end justify-between mt-6">
                        <p class="text-4xl font-black text-blue-600 leading-none">{{ \App\Models\Student::count() }}</p>
                        <div class="p-3 bg-blue-50 rounded-2xl group-hover:bg-blue-100 transition-colors">
                            <i class="fas fa-user-graduate text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </a>
            
            <!-- 2. Teachers (Sub ko nazar ayega) -->
            <a href="{{ route('teachers.index') }}" class="group block transition-all duration-300 active:scale-95">
                <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 border-l-4 border-teal-500 group-hover:shadow-xl group-hover:border-teal-200 transition-all h-full">
                    <h2 class="text-gray-400 uppercase text-[10px] font-black tracking-[0.2em] group-hover:text-teal-500 transition-colors">Total Teachers</h2>
                    <div class="flex items-end justify-between mt-6">
                        <p class="text-4xl font-black text-teal-600 leading-none">{{ \App\Models\Teacher::count() }}</p>
                        <div class="p-3 bg-teal-50 rounded-2xl group-hover:bg-teal-100 transition-colors">
                            <i class="fas fa-chalkboard-teacher text-teal-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </a>

           <!-- . Departments -->
                <a href="{{ route('departments.index') }}" class="group block transition-all duration-300 active:scale-95">
                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 border-l-4 border-pink-500 group-hover:shadow-xl group-hover:border-pink-200 transition-all h-full">
                        <h2 class="text-gray-400 uppercase text-[10px] font-black tracking-[0.2em] group-hover:text-pink-500 transition-colors">Departments</h2>
                        <div class="flex items-end justify-between mt-6">
                            <p class="text-4xl font-black text-pink-600 leading-none">{{ \App\Models\Department::count() ?? '0' }}</p>
                            <div class="p-3 bg-pink-50 rounded-2xl group-hover:bg-pink-100 transition-colors">
                                <i class="fas fa-building text-pink-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </a>

            <!-- . Faculty -->
            <a href="{{ route('faculties.index') }}" class="group block transition-all duration-300 active:scale-95">
                <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 border-l-4 border-cyan-500 group-hover:shadow-xl group-hover:border-cyan-200 transition-all h-full">
                    <h2 class="text-gray-400 uppercase text-[10px] font-black tracking-[0.2em] group-hover:text-cyan-500 transition-colors">Faculty Members</h2>
                    <div class="flex items-end justify-between mt-6">
                        <p class="text-4xl font-black text-cyan-600 leading-none">{{ \App\Models\Faculty::count() ?? '0' }}</p>
                        <div class="p-3 bg-cyan-50 rounded-2xl group-hover:bg-cyan-100 transition-colors">
                            <i class="fas fa-user-tie text-cyan-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </a>

          
                
     
                
            <!-- Role-Based Section: Sirf Admin ko dikhayein -->
  @if(auth()->user()->role == 'admin')
                <!-- 5. Admins -->
                <a href="{{ route('admins.index') }}" class="group block transition-all duration-300 active:scale-95">
                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 border-l-4 border-red-500 group-hover:shadow-xl group-hover:border-red-200 transition-all h-full">
                        <h2 class="text-gray-400 uppercase text-[10px] font-black tracking-[0.2em] group-hover:text-red-600 transition-colors">System Admins</h2>
                        <div class="flex items-end justify-between mt-6">
                            <p class="text-4xl font-black text-red-500 leading-none">{{ \App\Models\User::where('role','admin')->count() }}</p>
                            <div class="p-3 bg-red-50 rounded-2xl group-hover:bg-red-100 transition-colors">
                                <i class="fas fa-user-shield text-red-500 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- 6. Analytics -->
                <a href="{{ route('attendance.report') }}" class="group block transition-all duration-300 active:scale-95">
                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 border-l-4 border-indigo-500 group-hover:shadow-xl group-hover:border-indigo-200 transition-all h-full">
                        <h2 class="text-gray-400 uppercase text-[10px] font-black tracking-[0.2em] group-hover:text-indigo-500 transition-colors">Analytics Report</h2>
                        <div class="flex items-end justify-between mt-6">
                            <div class="flex flex-col">
                                <p class="text-4xl font-black text-indigo-600 leading-none">View</p>
                                <p class="text-[9px] font-bold text-gray-400 uppercase mt-1 tracking-tighter">Monthly Summary</p>
                            </div>
                            <div class="p-3 bg-indigo-50 rounded-2xl group-hover:bg-indigo-100 transition-colors">
                                <i class="fas fa-chart-pie text-indigo-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- 7. Financial Overview (Bari Card) -->
                <a href="{{ route('fees.index') }}" class="group block transition-all duration-300 active:scale-95 lg:col-span-3">
                    <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100 border-l-8 border-green-500 group-hover:shadow-2xl group-hover:border-green-200 transition-all overflow-hidden relative">
                        <i class="fas fa-money-bill-wave absolute -right-4 -bottom-4 text-9xl text-gray-50 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></i>
                        
                        <div class="flex justify-between items-center relative z-10">
                            <div>
                                <h2 class="text-gray-400 uppercase text-[11px] font-black tracking-[0.3em] group-hover:text-green-500 transition-colors">Financial Overview</h2>
                                <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mt-1">Total Paid Fees Revenue</p>
                                
                                <div class="mt-8 flex items-baseline gap-3">
                                    <span class="text-3xl font-light text-green-600 italic">Rs.</span>
                                    <span class="text-7xl font-black text-gray-800 tracking-tighter leading-none">
                                        {{ number_format(\App\Models\Fee::where('status', 'paid')->sum('amount') ?? 0) }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="flex flex-col items-center gap-2">
                                <div class="p-6 bg-green-50 rounded-[2rem] group-hover:bg-green-600 group-hover:text-white transition-all duration-500 shadow-inner">
                                    <i class="fas fa-wallet text-4xl"></i>
                                </div>
                                <span class="text-[10px] font-black text-green-500 uppercase tracking-widest">View Ledger</span>
                            </div>
                        </div>
                    </div>
                </a>
            @endif

        </div>
    </div>
</x-admin>