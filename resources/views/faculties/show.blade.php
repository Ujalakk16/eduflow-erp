<x-admin>
    <div class="p-6">
        <div class="mb-8">
            <a href="{{ route('faculties.index') }}" class="text-teal-600 font-bold text-sm hover:underline italic">
                <i class="fas fa-arrow-left"></i> Back to Faculties
            </a>
            <h1 class="text-3xl font-black text-slate-900 mt-4 uppercase">{{ $faculty->name }}</h1>
            <p class="text-slate-500 font-medium italic">List of all departments under this faculty</p>
        </div>

        <div class="bg-white rounded-[2rem] shadow-sm border border-slate-200 overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 text-xs font-black text-slate-500 uppercase">Dept Code</th>
                        <th class="px-6 py-4 text-xs font-black text-slate-500 uppercase">Department Name</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($faculty->departments as $dept)
                        <tr class="hover:bg-teal-50/30 transition-colors">
                            <td class="px-6 py-4 font-bold text-teal-600">{{ $dept->code }}</td>
                            <td class="px-6 py-4 font-medium text-slate-700">{{ $dept->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-6 py-10 text-center text-slate-400 italic">
                                No departments found in this faculty.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin>