<x-admin>
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100 mt-10">
        <h2 class="text-2xl font-black text-gray-800 mb-6 uppercase tracking-tighter">Add New Faculty</h2>

        <form action="{{ route('faculties.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Faculty Name</label>
                <input type="text" name="name" placeholder="e.g. Faculty of Engineering" class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-teal-500">
            </div>
            
            <div>
                <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Official Email</label>
                <input type="email" name="email" class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-teal-500">
            </div>

            <div>
                <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Contact Phone</label>
                <input type="text" name="phone" class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-teal-500">
            </div>

            <button type="submit" class="w-full bg-teal-600 text-white font-black py-4 rounded-xl shadow-lg hover:bg-teal-700 transition-all">
                CREATE FACULTY
            </button>
        </form>
    </div>
</x-admin>