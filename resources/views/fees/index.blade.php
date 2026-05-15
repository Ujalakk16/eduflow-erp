<x-admin>
    <div class="py-5 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Finance <span class="text-green-600">Management</span></h1>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-1">Track and collect student fees</p>
            </div>

            <div class="bg-green-600 px-6 py-3 rounded-2xl shadow-lg shadow-green-200">
                <p class="text-[9px] font-black text-green-100 uppercase tracking-widest">Total Collection</p>
                <!-- Sum function handle empty cases with 0 -->
                <p class="text-xl font-black text-white">Rs. {{ number_format(\App\Models\Fee::where('status', 'paid')->sum('amount') ?? 0) }}</p>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-green-700 text-[10px] uppercase font-black bg-green-50/30 border-b border-green-50">
                            <th class="py-5 px-8 tracking-widest">Student Details</th>
                            <th class="py-5 px-6 tracking-widest text-center">Last Payment</th>
                            <th class="py-5 px-6 tracking-widest text-center">Status</th>
                            <th class="py-5 px-8 tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($students as $student)
                        @php 
                            $currentMonthFee = $student->fees->where('month', date('F'))->where('year', date('Y'))->first();
                            $lastFee = $student->fees->last(); 
                        @endphp
                        <tr class="hover:bg-green-50/10 transition-colors">
                            <td class="py-4 px-8">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-xl bg-green-50 flex items-center justify-center text-green-600 font-black text-sm mr-4 border border-green-100">
                                        {{ substr($student->name, 0, 1) }}
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-gray-800 text-sm">{{ $student->name }}</span>
                                        <!-- FIX: Yahan '->name' add kiya hai taake JSON ke bajaye sirf naam dikhe -->
                                        <span class="text-[9px] text-gray-400 font-bold uppercase tracking-widest">
                                            {{ $student->course->name ?? 'No Course' }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <span class="text-xs font-bold text-gray-500">
                                    {{ $lastFee ? \Carbon\Carbon::parse($lastFee->payment_date)->format('d M, Y') : 'No Records' }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex flex-col items-center gap-1.5">
                                    @if($currentMonthFee)
                                        <span class="px-3 py-1 rounded-lg bg-green-100 text-green-700 text-[9px] font-black uppercase tracking-widest border border-green-200">Paid</span>
                                        <a href="{{ route('fees.receipt', $currentMonthFee->id) }}" target="_blank" class="text-[8px] font-black text-gray-400 hover:text-green-600 uppercase tracking-tighter flex items-center gap-1 transition-colors">
                                            <i class="fas fa-print"></i> Print Slip
                                        </a>
                                    @else
                                        <span class="px-3 py-1 rounded-lg bg-red-100 text-red-600 text-[9px] font-black uppercase tracking-widest border border-red-200">Pending</span>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-8 text-right">
                                <button onclick="openFeeModal('{{ $student->id }}', '{{ $student->name }}')" 
                                    class="bg-gray-800 hover:bg-green-600 text-white px-5 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all shadow-md active:scale-95">
                                    Pay Fee
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal remains the same as your structure was correct -->
    <div id="feeModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-[60] backdrop-blur-sm">
        <div class="bg-white rounded-[2rem] p-8 w-full max-w-md shadow-2xl">
            <h3 class="text-xl font-black text-gray-800 uppercase tracking-tight mb-1">Collect <span class="text-green-600">Fee</span></h3>
            <p id="modalStudentName" class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mb-6"></p>

            <form action="{{ route('fees.store') }}" method="POST">
                @csrf
                <input type="hidden" name="student_id" id="modalStudentId">
                
                <div class="space-y-4">
                    <div>
                        <label class="text-[10px] font-black uppercase text-gray-400 ml-1">Amount (Rs.)</label>
                        <input type="number" name="amount" required placeholder="Enter amount"
                            class="w-full bg-gray-50 border-2 border-gray-100 rounded-xl p-3 text-sm font-bold outline-none focus:border-green-500 transition-all">
                    </div>

                    <div>
                        <label class="text-[10px] font-black uppercase text-gray-400 ml-1">Fee Month</label>
                        <select name="month" class="w-full bg-gray-50 border-2 border-gray-100 rounded-xl p-3 text-sm font-bold outline-none focus:border-green-500 transition-all">
                            @foreach(['January','February','March','April','May','June','July','August','September','October','November','December'] as $month)
                                <option value="{{ $month }}" {{ $month == date('F') ? 'selected' : '' }}>{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex gap-3 mt-8">
                    <button type="button" onclick="closeFeeModal()" class="flex-1 px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest text-gray-400 hover:bg-gray-100 transition-all">Cancel</button>
                    <button type="submit" class="flex-1 bg-green-600 text-white px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-lg shadow-green-200 active:scale-95 transition-all">Submit Payment</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openFeeModal(id, name) {
            document.getElementById('modalStudentId').value = id;
            document.getElementById('modalStudentName').innerText = "Marking for: " + name;
            document.getElementById('feeModal').classList.remove('hidden');
            document.getElementById('feeModal').classList.add('flex');
        }

        function closeFeeModal() {
            document.getElementById('feeModal').classList.add('hidden');
            document.getElementById('feeModal').classList.remove('flex');
        }
    </script>
</x-admin>