<x-admin>
    <div class="p-6">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-black text-slate-900 uppercase tracking-tight">Faculties</h1>
                <p class="text-sm text-slate-500 font-medium">Manage academic faculties and their branches</p>
            </div>

            @if(auth()->user()->role == 'admin')
                <a href="{{ route('faculties.create') }}" 
                   class="inline-flex items-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-6 py-3 rounded-xl text-sm font-bold shadow-lg shadow-teal-100 transition-all active:scale-95">
                    <i class="fas fa-plus text-xs"></i>
                    <span>Add Faculty</span>
                </a>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($faculties as $faculty)
                <!-- Clickable Link Added Here -->
                <a href="{{ route('faculties.show', $faculty->id) }}" class="group block relative">
                    <div class="bg-white p-6 rounded-[2.5rem] border border-slate-200 shadow-sm group-hover:shadow-xl group-hover:border-teal-200 transition-all duration-300 relative overflow-hidden">
                        
                        <!-- Animated background circle on hover -->
                        <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-teal-50 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500"></div>

                        <div class="flex justify-between items-start relative z-10">
                            <div class="flex-1">
                                <div class="inline-block px-2 py-0.5 rounded-md bg-teal-50 mb-2">
                                    <span class="text-[10px] font-black text-teal-600 uppercase tracking-[0.2em]">
                                        {{ $faculty->code }}
                                    </span>
                                </div>

                                <h3 class="text-xl font-extrabold text-slate-800 leading-tight group-hover:text-teal-700 transition-colors">
                                    {{ $faculty->name }}
                                </h3>
                                
                                <div class="mt-4 flex items-center gap-3 text-slate-500 text-xs font-bold">
                                    <span class="flex items-center gap-1.5 bg-slate-100 px-3 py-1 rounded-full group-hover:bg-teal-100 group-hover:text-teal-700 transition-colors">
                                        <i class="fas fa-sitemap text-teal-500"></i>
                                        {{ $faculty->departments_count ?? '0' }} Departments
                                    </span>
                                </div>
                            </div>

                            <div class="bg-slate-50 p-4 rounded-2xl group-hover:bg-teal-600 transition-colors duration-300">
                                <i class="fas fa-university text-slate-300 text-3xl group-hover:text-white transition-colors"></i>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-admin>