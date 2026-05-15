<x-admin>
    <div class="p-6">
        <!-- Back Button & Title -->
        <div class="mb-8">
            <a href="{{ route('departments.index') }}" class="text-teal-600 font-bold flex items-center gap-2 mb-2">
                <i class="fas fa-arrow-left text-xs"></i> Back to Departments
            </a>
            <h1 class="text-3xl font-black text-slate-900 uppercase">{{ $department->name }}</h1>
            <p class="text-slate-500 font-medium">List of all students enrolled in this department.</p>
        </div>

        <!-- Students Table -->
        <div class="bg-white rounded-[2rem] border border-slate-200 overflow-hidden shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="py-4 px-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">ID</th>
                        <th class="py-4 px-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Student Info</th>
                        <th class="py-4 px-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Course</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($department->students as $student)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-5 px-6 text-sm font-bold text-slate-400">#{{ $student->id }}</td>
                            <td class="py-5 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-teal-50 flex items-center justify-center text-teal-600 font-black text-xs">
                                        {{ substr($student->name, 0, 2) }}
                                    </div>
                                    <div>
                                        <div class="text-sm font-black text-slate-800">{{ $student->name }}</div>
                                        <div class="text-[11px] text-slate-400 font-medium">{{ $student->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-5 px-6">
                                <span class="text-sm font-bold text-slate-700">{{ $student->course->name ?? 'No Course' }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-20 text-center text-slate-400 font-medium">
                                No students found in this department.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin>