<x-admin>
    <div class="py-2">
        <div class="max-w-7xl mx-auto">

            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Student <span class="text-teal-600">Directory</span></h1>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-1">Manage and view all registered students</p>
                </div>

                @if(auth()->user()->role == 'admin')
                <a href="{{ route('students.create') }}"
                    class="w-full sm:w-auto bg-teal-600 hover:bg-teal-700 text-white text-center px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-widest transition duration-200 shadow-lg shadow-teal-100 flex items-center justify-center">
                    <i class="fas fa-plus mr-2 text-[10px]"></i> Add Student
                </a>
                @endif
            </div>

            <!-- Table Section -->
            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-teal-700 text-[10px] uppercase font-black bg-teal-50/30 border-b border-teal-50">
                                <th class="py-5 px-8 tracking-widest">ID</th>
                                <th class="py-5 px-4 tracking-widest text-center">Image</th>
                                <th class="py-5 px-6 tracking-widest">Student Info</th>
                                <th class="py-5 px-6 tracking-widest">Department</th> {{-- New Column --}}
                                <th class="py-5 px-6 tracking-widest">Course & Teacher</th>
                                @if(auth()->user()->role == 'admin')
                                <th class="py-5 px-8 tracking-widest text-right">Actions</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-50">
                            @foreach($students as $student)
                            <tr class="hover:bg-teal-50/10 transition-colors duration-200">
                                <td class="py-5 px-8 font-bold text-gray-400 text-xs">#{{ $student->id }}</td>
                                
                                <td class="py-5 px-4 text-center">
                                    <div class="h-10 w-10 rounded-xl overflow-hidden mx-auto shadow-sm border border-gray-100">
                                        @if($student->image)
                                            <img src="{{ asset('storage/' . $student->image) }}" class="h-full w-full object-cover">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=f0fdfa&color=0d9488&bold=true" class="h-full w-full">
                                        @endif
                                    </div>
                                </td>

                                <td class="py-5 px-6">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-gray-800 text-sm">{{ $student->name }}</span>
                                        <span class="text-[10px] text-gray-400 font-medium">{{ $student->email }}</span>
                                    </div>
                                </td>

                                {{-- Department Column --}}
                                <td class="py-5 px-6">
                                    <span class="px-3 py-1 rounded-lg bg-slate-100 text-slate-600 text-[10px] font-black uppercase tracking-widest border border-slate-200">
                                        {{ $student->department->name ?? 'NO DEPT' }}
                                    </span>
                                </td>

                                <td class="py-5 px-6">
                                    <div class="flex flex-col">
                                        @if($student->course)
                                            <span class="text-gray-800 font-bold text-sm tracking-tight">
                                                {{ is_string($student->course) ? $student->course : $student->course->name }} 
                                            </span>
                                            <span class="text-[9px] text-teal-600 font-black uppercase tracking-widest mt-0.5">
                                                <i class="fas fa-user-tie mr-1 opacity-70"></i> 
                                                {{ $student->teacher->name ?? 'No Teacher' }}
                                            </span>
                                        @else
                                            <span class="text-[10px] font-bold text-gray-300 uppercase tracking-widest">Not Enrolled</span>
                                        @endif
                                    </div>
                                </td>

                                @if(auth()->user()->role == 'admin')
                                <td class="py-5 px-8">
                                    <div class="flex justify-end space-x-3 items-center">
                                        <a href="{{ route('students.edit',$student->id) }}" class="text-teal-500 hover:text-teal-700 transition transform hover:scale-110">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('students.destroy',$student->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete {{ $student->name }}?');">
                                            @csrf @method('DELETE')
                                            <button class="text-red-400 hover:text-red-600 transition transform hover:scale-110">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin>