<x-admin>
    <div class="py-5 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Attendance <span class="text-indigo-600">Report</span></h1>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-1">Monthly performance summary</p>
            </div>
            
            <form action="{{ route('attendance.report') }}" method="GET" class="flex gap-2">
                <select name="month" class="bg-white border-2 border-gray-100 rounded-xl p-2 text-xs font-bold text-gray-600 outline-none focus:border-indigo-500 transition-all">
                    @foreach(range(1, 12) as $m)
                        <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $m, 1)) }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all hover:bg-indigo-700 active:scale-95">Filter</button>
            </form>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-indigo-700 text-[10px] uppercase font-black bg-indigo-50/30 border-b border-indigo-50">
                            <th class="py-5 px-8 tracking-widest">Student</th>
                            <th class="py-5 px-6 tracking-widest text-center">Presents</th>
                            <th class="py-5 px-6 tracking-widest text-center">Absents</th>
                            <th class="py-5 px-6 tracking-widest text-center">Percentage</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($students as $student)
                            @php
                                $presents = $student->presents_count ?? 0;
                                $absents = $student->absents_count ?? 0;
                                $total = $presents + $absents;
                                
                                $currentPercent = ($total > 0) ? round(($presents / $total) * 100) : 0;
                            @endphp

                            <tr class="hover:bg-indigo-50/10 transition-colors">
                                <td class="py-4 px-8 font-bold text-gray-800 text-sm">
                                    {{ $student->name }}
                                </td>
                                
                                <td class="py-4 px-6 text-center font-bold text-green-600 text-sm">
                                    {{ $presents }}
                                </td>
                                
                                <td class="py-4 px-6 text-center font-bold text-red-500 text-sm">
                                    {{ $absents }}
                                </td>
                                
<td class="py-4 px-6 text-center">
    <div class="flex items-center justify-center space-x-3">
        {{-- Progress Bar Container --}}
        <div class="w-24 bg-gray-100 rounded-full h-2 overflow-hidden shadow-inner">
            
            {{-- Sabse Safe Tareeqa: Style ko PHP variable mein pehle hi bana lo --}}
            @php $barWidth = "width: " . $currentPercent . "%;"; @endphp

            <div class="bg-indigo-600 h-full rounded-full transition-all duration-500" 
                 {{ $barWidth }}>
            </div>
        </div>
        
        <span class="text-[11px] font-black text-gray-600 w-10 text-left">
            {{ $currentPercent }}%
        </span>
    </div>
</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin>