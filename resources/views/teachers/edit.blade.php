<x-admin>
    <div class="max-w-2xl mx-auto py-10">
        <h1 class="text-2xl font-black text-gray-800 uppercase mb-6">Edit <span class="text-teal-600">Teacher</span></h1>

        <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100">
            {{-- Action mein update route aur method PUT lazmi hai --}}
            <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Teacher Name</label>
                    <input type="text" name="name" value="{{ $teacher->name }}" class="w-full bg-gray-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-teal-500/20" required>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Course Name</label>
                    <input type="text" name="course_name" value="{{ $teacher->course_name }}" class="w-full bg-gray-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-teal-500/20" required>
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('teachers.index') }}" class="text-xs font-bold text-gray-400">Back</a>
                    <button type="submit" class="bg-teal-600 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:bg-teal-700 transition">Update Now</button>
                </div>
            </form>
        </div>
    </div>
</x-admin>