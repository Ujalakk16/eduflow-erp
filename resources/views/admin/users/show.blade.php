<x-admin>
    <div class="py-10 px-4 max-w-4xl mx-auto">
        <a href="{{ route('admins.index') }}" class="text-[10px] font-black uppercase text-gray-400 hover:text-purple-600 transition-all">
            <i class="fas fa-arrow-left mr-1"></i> Back to List
        </a>

        <div class="bg-white rounded-[2.5rem] shadow-xl p-8 mt-4 border border-gray-100 flex flex-col md:flex-row items-center gap-8">
            <div class="h-32 w-32 rounded-[2rem] bg-purple-600 flex items-center justify-center text-white text-4xl font-black shadow-2xl shadow-purple-200">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div class="text-center md:text-left">
                <h1 class="text-3xl font-black text-gray-800 tracking-tight">{{ $user->name }}</h1>
                <p class="text-gray-400 font-bold uppercase text-xs tracking-widest">{{ $user->email }}</p>
                <span class="inline-block mt-3 px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-widest {{ $user->role == 'admin' ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }}">
                    {{ $user->role }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
            <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-50">
                <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Account Information</h3>
                <div class="space-y-3">
                    <div class="flex justify-between text-sm"><span class="text-gray-400">User ID:</span> <span class="font-bold text-gray-800">#{{ $user->id }}</span></div>
                    <div class="flex justify-between text-sm"><span class="text-gray-400">Joined Date:</span> <span class="font-bold text-gray-800">{{ $user->created_at->format('M d, Y') }}</span></div>
                    <div class="flex justify-between text-sm"><span class="text-gray-400">Status:</span> <span class="font-bold text-green-500">Active Account</span></div>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-50">
                <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">System Stats</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-purple-50 p-4 rounded-2xl text-center">
                        <p class="text-purple-600 font-black text-xl">{{ $user->role == 'admin' ? '∞' : 'User' }}</p>
                        <p class="text-[8px] font-bold text-purple-400 uppercase">Access Level</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-2xl text-center">
                        <p class="text-gray-600 font-black text-xl">Verified</p>
                        <p class="text-[8px] font-bold text-gray-400 uppercase">Identity</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>