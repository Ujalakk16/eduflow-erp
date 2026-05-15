<x-admin>
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-black text-gray-800 uppercase mb-8">
             <span class="text-teal-600">Profile Settings</span>
        </h2>

        <div class="space-y-6">
            <!-- Profile Information Form -->
            <div class="p-8 bg-white shadow-sm border border-gray-100 rounded-[2rem]">
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- Update Password Form -->
            <div class="p-8 bg-white shadow-sm border border-gray-100 rounded-[2rem]">
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>
</x-admin>