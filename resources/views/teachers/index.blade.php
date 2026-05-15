<x-admin>
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Teacher <span class="text-teal-600">Profiles</span></h1>
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-1">Manage and view all registered instructors</p>
        </div>
        
        {{-- Sirf Admin ko Add Button dikhega --}}
        @if(auth()->user()->role == 'admin')
        <a href="{{ route('teachers.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl shadow-lg shadow-teal-100 transition-all duration-300 hover:-translate-y-1 flex items-center font-bold text-sm">
            <i class="fas fa-plus mr-2"></i> Add New Teacher
        </a>
        @endif
    </div>

    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-teal-700 text-[10px] uppercase font-black bg-teal-50/30 border-b border-teal-50">
                        <th class="py-4 px-8 tracking-widest">Instructor</th>
                        <th class="py-4 px-6 tracking-widest">Specialization (Course)</th>
                        <th class="py-4 px-6 tracking-widest text-center">Total Students</th>
                        <th class="py-4 px-6 tracking-widest text-center">Date Joined</th>
                        
                        {{-- Actions Header sirf Admin ko dikhe --}}
                        @if(auth()->user()->role == 'admin')
                        <th class="py-4 px-6 tracking-widest text-center">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($teachers as $teacher)
                        <tr class="hover:bg-teal-50/10 transition-colors duration-200">
                            <td class="py-4 px-8 flex items-center">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($teacher->name) }}&background=f0fdfa&color=0d9488&bold=true" class="h-10 w-10 rounded-xl mr-4 shadow-sm">
                                <span class="font-bold text-gray-800 text-sm">{{ $teacher->name }}</span>
                            </td>
                           <td class="py-4 px-6">
    <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-tighter border border-gray-200">
        {{-- Agar relationship hai toh aise --}}
        {{ $teacher->course->name ?? 'No Course' }}
    </span>
</td>
                            
                            <td class="py-4 px-6 text-center">
                                <span class="bg-teal-100 text-teal-700 px-3 py-1 rounded-full text-[10px] font-black tracking-widest">
                                    {{ $teacher->students_count }} ENROLLED
                                </span>
                            </td>

                            <td class="py-4 px-6 text-center text-xs text-gray-500 font-medium">
                                {{ $teacher->created_at->format('d M, Y') }}
                            </td>

                            {{-- Edit aur Delete sirf Admin ke liye --}}
                            @if(auth()->user()->role == 'admin')
                            <td class="py-4 px-6 text-center">
                                <div class="flex justify-center space-x-3 items-center">
                                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="text-teal-500 hover:text-teal-700 transition transform hover:scale-110">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="inline" onsubmit="return confirm('Kya aap waqai delete karna chahte hain?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-600 transition transform hover:scale-110">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ auth()->user()->role == 'admin' ? 5 : 4 }}" class="py-20 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-user-slash text-4xl text-gray-200 mb-4"></i>
                                    <p class="text-gray-400 font-bold uppercase text-xs tracking-widest">No teachers found</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin>