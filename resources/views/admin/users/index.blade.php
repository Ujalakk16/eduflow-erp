<x-admin>
    <div class="py-10 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-black text-gray-800 uppercase tracking-tight">System <span class="text-purple-600">Users</span></h1>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-1">Manage All Registered Accounts</p>
                </div>
                <div class="bg-purple-100 text-purple-600 px-4 py-2 rounded-2xl text-[10px] font-black uppercase tracking-widest">
                    Total: {{ $users->total() }}
                </div>
            </div>

            <div class="bg-white shadow-2xl rounded-[2.5rem] overflow-hidden border border-gray-100">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50/50">
                        <tr>
                            <th class="p-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">User Details</th>
                            <th class="p-6 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">Role</th>
                            <th class="p-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Joined Date</th>
                            <th class="p-6 text-[10px] font-black text-gray-400 uppercase tracking-widest text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($users as $user)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="p-6">
                                <div class="flex items-center">
                                    <a href="{{ route('users.show', $user->id) }}" class="h-10 w-10 rounded-xl bg-purple-600 flex items-center justify-center text-white font-bold mr-4 shadow-lg shadow-purple-200 hover:scale-105 transition-transform active:scale-95">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </a>
                                    <div>
                                        <a href="{{ route('users.show', $user->id) }}" class="text-sm font-black text-gray-800 leading-tight hover:text-purple-600 transition-colors block">
                                            {{ $user->name }}
                                        </a>
                                        <p class="text-[10px] text-gray-400 font-medium">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-6 text-center">
                                <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest {{ $user->role == 'admin' ? 'bg-red-100 text-red-600' : 'bg-gray-100 text-gray-600' }}">
                                    {{ $user->role ?? 'User' }}
                                </span>
                            </td>
                            <td class="p-6 text-xs text-gray-500 font-medium">
                                {{ $user->created_at->format('M d, Y') }}
                            </td>
                            
                            <td class="p-6 text-right relative" x-data="{ open: false }">
                                <button @click="open = !open" @click.away="open = false" class="hover:bg-purple-50 p-2 rounded-lg transition-colors text-purple-600 focus:outline-none">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>

                                <div x-show="open" 
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="transform opacity-0 scale-95"
                                     x-transition:enter-end="transform opacity-100 scale-100"
                                     class="absolute right-6 mt-2 w-40 bg-white rounded-xl shadow-xl border border-gray-100 z-50 overflow-hidden py-1"
                                     style="display: none;">
                                    
                                    <a href="{{ route('users.show', $user->id) }}" class="flex items-center px-4 py-2 text-[10px] font-black uppercase tracking-widest text-gray-600 hover:bg-purple-50 hover:text-purple-600 transition-colors">
                                        <i class="fas fa-user-circle mr-2 text-purple-400"></i> View Profile
                                    </a>

                                    <div class="border-t border-gray-50 my-1"></div>

                                    <a href="{{ route('profile.edit', $user->id) }}" class="flex items-center px-4 py-2 text-[10px] font-black uppercase tracking-widest text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                        <i class="fas fa-edit mr-2 text-blue-400"></i> Edit User
                                    </a>

                                    <form action="{{ route('profile.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full flex items-center px-4 py-2 text-[10px] font-black uppercase tracking-widest text-red-500 hover:bg-red-50 transition-colors text-left">
                                            <i class="fas fa-trash-alt mr-2 text-red-400"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="p-6 bg-gray-50/30 border-t border-gray-50">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin>