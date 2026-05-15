<x-admin>
    <div class="py-10 px-4">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white shadow-2xl rounded-[2.5rem] overflow-hidden border border-gray-100">

                <!-- Header Section -->
                <div class="bg-gradient-to-r from-teal-600 to-indigo-700 p-8">
                    <h2 class="text-2xl font-black text-white flex items-center uppercase tracking-tight">
                        <i class="fas fa-user-plus mr-3"></i>
                        Add New <span class="ml-2 opacity-80">Student</span>
                    </h2>
                    <p class="text-[10px] text-teal-100 font-bold uppercase tracking-[0.2em] mt-2">Register a new student to the system</p>
                </div>

                <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="p-10 space-y-6">
                    @csrf

                    <!-- Student Name -->
                    <div class="group">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Student Name</label>
                        <input type="text" name="name" placeholder="John Doe" value="{{ old('name') }}" required
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl p-4 text-sm focus:bg-white focus:border-teal-500/20 focus:ring-4 focus:ring-teal-500/5 outline-none transition-all">
                        @error('name') <p class="text-red-500 text-[10px] mt-1 font-bold ml-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Email Address -->
                        <div class="group">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Email Address</label>
                            <input type="email" name="email" placeholder="email@example.com" value="{{ old('email') }}" required
                                class="w-full bg-gray-50 border-2 border-transparent rounded-2xl p-4 text-sm focus:bg-white focus:border-teal-500/20 focus:ring-4 focus:ring-teal-500/5 outline-none transition-all">
                            @error('email') <p class="text-red-500 text-[10px] mt-1 font-bold ml-1">{{ $message }}</p> @enderror
                        </div>
                        <!-- Phone Number -->
                        <div class="group">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Phone Number</label>
                            <input type="text" name="phone" placeholder="+92 300 0000000" value="{{ old('phone') }}"
                                class="w-full bg-gray-50 border-2 border-transparent rounded-2xl p-4 text-sm focus:bg-white focus:border-teal-500/20 focus:ring-4 focus:ring-teal-500/5 outline-none transition-all">
                            @error('phone') <p class="text-red-500 text-[10px] mt-1 font-bold ml-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Department Drop-down (Dynamic from Database) -->
                    <div class="group">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Select Department</label>
                        <div class="relative">
                            <select name="department_id" required
                                class="w-full bg-gray-50 border-2 border-transparent rounded-2xl p-4 text-sm focus:bg-white focus:border-teal-500/20 focus:ring-4 focus:ring-teal-500/5 outline-none transition-all appearance-none cursor-pointer font-bold text-gray-700">
                                <option value="" disabled selected>-- Choose Department --</option>
                                @foreach($departments as $dept)
                                    <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>
                                        {{ $dept->name }} ({{ $dept->code }})
                                    </option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-5 text-gray-400">
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                        @error('department_id') <p class="text-red-500 text-[10px] mt-1 font-bold ml-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Profile Picture Upload -->
                    <div class="group">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Profile Picture</label>
                        <div class="relative border-2 border-dashed border-gray-200 rounded-[1.5rem] p-6 hover:border-teal-400 transition bg-gray-50/50 text-center">
                            <input type="file" name="image" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            <div class="text-gray-400">
                                <i class="fas fa-cloud-upload-alt text-3xl mb-2"></i>
                                <p class="text-xs font-bold uppercase tracking-tight">Click or drag image here</p>
                            </div>
                        </div>
                        @error('image') <p class="text-red-500 text-[10px] mt-1 font-bold ml-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-6 flex items-center justify-end space-x-4 border-t border-gray-50">
                        <a href="{{ route('students.index') }}" class="px-6 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest hover:text-red-500 transition-colors">
                            Cancel
                        </a>
                        <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-bold text-xs uppercase tracking-widest px-10 py-4 rounded-2xl shadow-xl shadow-teal-200 transition-all active:scale-95 flex items-center">
                            <i class="fas fa-save mr-2"></i> Save Student
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin>