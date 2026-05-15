<x-admin>
    <div class="p-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div>
                <h1 class="text-3xl font-black text-slate-900 uppercase tracking-tight">
                    Academic <span class="text-teal-600">Departments</span>
                </h1>
                <p class="text-[11px] text-slate-400 font-bold uppercase tracking-[0.2em] mt-1">
                    Manage and view all institutional structures
                </p>
            </div>

            @if(auth()->user()->role == 'admin')
                <a href="{{ route('departments.create') }}" 
                   class="inline-flex items-center gap-3 bg-teal-600 hover:bg-teal-700 text-white px-7 py-3.5 rounded-2xl text-[11px] font-black uppercase tracking-widest shadow-xl shadow-teal-100 transition-all active:scale-95">
                    <i class="fas fa-plus text-[10px]"></i>
                    <span>Add Department</span>
                </a>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($departments as $dept)
                <a href="{{ route('departments.show', $dept->id) }}" class="group block relative">
                    <div class="absolute inset-0 bg-teal-500/10 blur-2xl rounded-[3rem] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="bg-white p-7 rounded-[3rem] border border-slate-100 shadow-sm group-hover:shadow-2xl group-hover:border-teal-100 transition-all duration-500 relative overflow-hidden h-full flex flex-col justify-between">
                        
                        <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-teal-50/50 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <div class="relative z-10">
                            <div class="inline-block px-3 py-1 rounded-xl bg-teal-50 mb-4 border border-teal-100/50">
                                <span class="text-[9px] font-black text-teal-600 uppercase tracking-[0.25em]">
                                    {{ $dept->code ?? 'DEPT' }}
                                </span>
                            </div>

                            <h3 class="text-xl font-extrabold text-slate-800 leading-[1.2] tracking-tight group-hover:text-teal-700 transition-colors">
                                {{ $dept->name }}
                            </h3>
                            
                            <div class="mt-6 flex items-center gap-3">
                                <span class="flex items-center gap-2 bg-slate-50 px-4 py-2 rounded-2xl text-[10px] font-black uppercase tracking-widest text-slate-500 group-hover:bg-teal-600 group-hover:text-white transition-all duration-500">
                                    <i class="fas fa-users {{ auth()->user()->role == 'admin' ? 'text-teal-500 group-hover:text-teal-100' : '' }}"></i>
                                    {{ $dept->students_count ?? '0' }} Students
                                </span>
                            </div>
                        </div>

                        <div class="absolute top-7 right-7">
                            <div class="bg-slate-50 w-14 h-14 flex items-center justify-center rounded-[1.25rem] group-hover:bg-teal-50 transition-colors duration-500">
                                <i class="fas fa-building text-slate-300 text-2xl group-hover:text-teal-500 transition-all duration-500 group-hover:rotate-6"></i>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-admin>