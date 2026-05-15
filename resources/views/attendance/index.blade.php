<x-admin>
    <div class="py-5 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        
        <form action="{{ route('attendance.index') }}" method="GET" id="dateForm">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Daily <span class="text-orange-600">Attendance</span></h1>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-1">Mark student presence for today</p>
                </div>
                
                <div class="relative w-full md:w-auto">
                    <input type="date" name="date" value="{{ $date }}" onchange="document.getElementById('dateForm').submit()"
                        class="w-full md:w-64 bg-white border-2 border-gray-100 rounded-2xl p-3 text-sm font-bold text-gray-600 focus:border-orange-500 outline-none shadow-sm transition-all">
                    <i class="fas fa-calendar absolute right-4 top-1/2 -translate-y-1/2 text-orange-500 pointer-events-none"></i>
                </div>
            </div>
        </form>

        <form action="{{ route('attendance.store') }}" method="POST">
            @csrf
            <input type="hidden" name="date" value="{{ $date }}">

            <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-orange-700 text-[10px] uppercase font-black bg-orange-50/30 border-b border-orange-50">
                                <th class="py-5 px-8 tracking-widest">Student Info</th>
                                <th class="py-5 px-6 tracking-widest text-center">Status</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-50">
                            @foreach($students as $student)
                            <tr class="hover:bg-orange-50/10 transition-colors">
                                <td class="py-4 px-8">
                                    <div class="flex items-center">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=fff7ed&color=ea580c&bold=true" 
                                             class="h-10 w-10 rounded-xl mr-4 shadow-sm border border-orange-100">
                                        <div class="flex flex-col">
                                            <span class="font-bold text-gray-800 text-sm">{{ $student->name }}</span>
                                            <!-- FIX: Yahan '->name' add kiya hai JSON display khatam karne ke liye -->
                                            <span class="text-[9px] text-gray-400 font-bold uppercase tracking-widest">
                                                {{ $student->course->name ?? 'No Course Assigned' }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <td class="py-4 px-6">
                                    <div class="flex justify-center items-center space-x-2">
                                        <label class="cursor-pointer">
                                            <input type="radio" name="status[{{ $student->id }}]" value="present" class="hidden peer" checked>
                                            <div class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all
                                                bg-gray-50 text-gray-400 border border-transparent
                                                peer-checked:bg-green-50 peer-checked:text-green-600 peer-checked:border-green-200 peer-checked:shadow-sm">
                                                Present
                                            </div>
                                        </label>

                                        <label class="cursor-pointer">
                                            <input type="radio" name="status[{{ $student->id }}]" value="absent" class="hidden peer">
                                            <div class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all
                                                bg-gray-50 text-gray-400 border border-transparent
                                                peer-checked:bg-red-50 peer-checked:text-red-600 peer-checked:border-red-200 peer-checked:shadow-sm">
                                                Absent
                                            </div>
                                        </label>

                                        <label class="cursor-pointer hidden sm:block">
                                            <input type="radio" name="status[{{ $student->id }}]" value="leave" class="hidden peer">
                                            <div class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all
                                                bg-gray-50 text-gray-400 border border-transparent
                                                peer-checked:bg-blue-50 peer-checked:text-blue-600 peer-checked:border-blue-200 peer-checked:shadow-sm">
                                                Leave
                                            </div>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit" class="w-full md:w-auto bg-orange-600 hover:bg-orange-700 text-white font-black text-xs uppercase tracking-widest px-12 py-5 rounded-2xl shadow-xl shadow-orange-200 transition-all active:scale-95 flex items-center justify-center">
                    <i class="fas fa-check-circle mr-2"></i> Save Attendance
                </button>
            </div>
        </form>
    </div>
</x-admin>