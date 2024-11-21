<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-50 to-blue-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-white shadow-md rounded-lg transition-transform duration-300 hover:scale-105">
                <h3 class="text-xl font-bold mb-4 text-blue-600">Update Profile Information</h3>
                <livewire:profile.update-profile-information-form />
            </div>

            <div class="p-6 bg-white shadow-md rounded-lg transition-transform duration-300 hover:scale-105">
                <h3 class="text-xl font-bold mb-4 text-blue-600">Change Password</h3>
                <livewire:profile.update-password-form />
            </div>

            <div class="p-6 bg-white shadow-md rounded-lg transition-transform duration-300 hover:scale-105">
                <h3 class="text-xl font-bold mb-4 text-blue-600">Delete Account</h3>
                <livewire:profile.delete-user-form />
            </div>
        </div>
    </div>

    <footer class="bg-white shadow mt-12 py-4">
        <div class="max-w-7xl mx-auto text-center text-gray-600">
            <p>© {{ date('Y') }} Your Company. All rights reserved.</p>
            <div class="space-x-4">
                <a href="#" class="text-blue-600 hover:underline">Help</a>
                <a href="#" class="text-blue-600 hover:underline">Terms</a>
                <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a>
            </div>
        </div>
    </footer>
</x-app-layout>
