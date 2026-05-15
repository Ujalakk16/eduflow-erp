<x-admin>
    <div class="max-w-3xl mx-auto py-12 px-4">
        
        <!-- Header Section -->
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-black text-gray-800 uppercase tracking-tight">
                    Add New <span class="text-teal-600">Teacher</span>
                </h1>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-1">
                    Enter details to register a new faculty member
                </p>
            </div>
            <a href="{{ route('teachers.index') }}" class="h-10 w-10 flex items-center justify-center rounded-xl bg-white shadow-sm border border-gray-100 text-gray-400 hover:text-teal-600 transition-all hover:shadow-md">
                <i class="fas fa-times"></i>
            </a>
        </div>

        <!-- Stylish Form Card -->
        <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-teal-900/5 border border-gray-50 p-10 relative overflow-hidden">
            
            <!-- Background Decorative Circle -->
            <div class="absolute top-0 right-0 -mr-16 -mt-16 w-48 h-48 bg-teal-50 rounded-full blur-3xl opacity-60"></div>

            <form action="{{ route('teachers.store') }}" method="POST" class="relative space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Teacher Name -->
                    <div class="group">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1 group-focus-within:text-teal-600 transition-colors">Teacher Name</label>
                        <div class="relative">
                            <i class="fas fa-user-tie absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-teal-500 transition-colors"></i>
                            <input type="text" name="name" placeholder="Full Name" required
                                class="w-full bg-gray-50 border-2 border-transparent rounded-2xl pl-12 pr-4 py-4 text-sm focus:bg-white focus:border-teal-500/20 focus:ring-4 focus:ring-teal-500/5 outline-none transition-all placeholder:text-gray-300">
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="group">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1 group-focus-within:text-teal-600 transition-colors">Email Address</label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-teal-500 transition-colors"></i>
                            <input type="email" name="email" placeholder="example@mail.com" required
                                class="w-full bg-gray-50 border-2 border-transparent rounded-2xl pl-12 pr-4 py-4 text-sm focus:bg-white focus:border-teal-500/20 focus:ring-4 focus:ring-teal-500/5 outline-none transition-all placeholder:text-gray-300">
                        </div>
                    </div>

                   <!-- Course Name Drop-down -->
<div class="group">
    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1 group-focus-within:text-teal-600 transition-colors">Select Course</label>
    <div class="relative">
        <i class="fas fa-graduation-cap absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-teal-500 transition-colors z-10"></i>
        
        <select name="course_name" required
            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl pl-12 pr-4 py-4 text-sm focus:bg-white focus:border-teal-500/20 focus:ring-4 focus:ring-teal-500/5 outline-none transition-all appearance-none">
            <option value="" disabled selected>Choose a course</option>
            
            {{-- Aap ye options wahi rakhein jo Student registration mein hain --}}
            <option value="Web Development">Web Development</option>
            <option value="Laravel">Laravel</option>
            <option value="Python">Python</option>
            <option value="PHP">PHP</option>
            <option value="Web Design">Web Design</option>
        </select>
        
        <!-- Dropdown Arrow Icon -->
        <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-300 pointer-events-none text-xs"></i>
    </div>
    <p class="text-[9px] text-gray-400 mt-2 ml-1 italic font-medium">* Select wahi karein jo students ke pass hai taake count sahi aaye</p>
</div>

                    <!-- Phone Number -->
                    <div class="group">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1 group-focus-within:text-teal-600 transition-colors">Phone Number</label>
                        <div class="relative">
                            <i class="fas fa-phone absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-teal-500 transition-colors"></i>
                            <input type="text" name="phone" placeholder="+92 300 0000000"
                                class="w-full bg-gray-50 border-2 border-transparent rounded-2xl pl-12 pr-4 py-4 text-sm focus:bg-white focus:border-teal-500/20 focus:ring-4 focus:ring-teal-500/5 outline-none transition-all placeholder:text-gray-300">
                        </div>
                    </div>

                </div>

                <!-- Footer / Action -->
                <div class="pt-8 flex items-center justify-end space-x-4 border-t border-gray-50 mt-4">
                    <button type="reset" class="px-6 py-4 text-[10px] font-black text-gray-400 uppercase tracking-widest hover:text-red-500 transition-colors">
                        Clear Fields
                    </button>
                    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-bold text-xs uppercase tracking-widest px-10 py-4 rounded-2xl shadow-xl shadow-teal-200 transition-all active:scale-95 flex items-center">
                        <i class="fas fa-save mr-2"></i> Save Teacher
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin>