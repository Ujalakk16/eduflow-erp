<x-admin>
    <div class="px-4 py-6 max-w-2xl mx-auto">
        <div class="mb-8">
            <h1 class="text-2xl font-black text-gray-800 uppercase tracking-tighter">Add New Department</h1>
            <p class="text-xs text-gray-400 font-bold uppercase tracking-widest">Create a new academic unit</p>
        </div>

        <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
            <form action="{{ route('departments.store') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    {{-- Department Name --}}
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-2 block">Department Name</label>
                        <input type="text" name="name" placeholder="e.g. Information Technology" 
                               class="w-full bg-gray-50 border-none rounded-2xl px-5 py-4 text-sm font-bold focus:ring-2 focus:ring-teal-500 transition-all">
                        @error('name') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                    </div>

                    {{-- Department Code --}}
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-2 block">Department Code</label>
                        <input type="text" name="code" placeholder="e.g. IT" 
                               class="w-full bg-gray-50 border-none rounded-2xl px-5 py-4 text-sm font-bold focus:ring-2 focus:ring-teal-500 transition-all uppercase">
                        @error('code') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-gray-900 text-white py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-teal-600 transition-all shadow-xl shadow-gray-200">
                            Save Department
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin>