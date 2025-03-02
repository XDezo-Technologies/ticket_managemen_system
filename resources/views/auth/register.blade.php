<x-guest-layout>
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Welcome! Create Your Account</h2>
    
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
    
            <div class="grid grid-cols-2 gap-4">
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Full Name')" class="font-semibold" />
                    <x-text-input id="name" class="block w-full border rounded-md px-3 py-2 focus:ring focus:ring-indigo-300" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
                </div>
                 <!-- Address -->
                 <div>
                    <x-input-label for="address" :value="__('Address')" class="font-semibold" />
                    <x-text-input id="address" class="block w-full border rounded-md px-3 py-2 focus:ring focus:ring-indigo-300" type="text" name="address" :value="old('address')" />
                    <x-input-error :messages="$errors->get('address')" class="mt-2 text-red-500" />
                </div>
    
               

            </div>
    

    
            <div class="grid  gap-4 mt-4">
                <!-- Phone -->
                <div>
                    <x-input-label for="phone" :value="__('Phone Number')" class="font-semibold" />
                    <x-text-input id="phone" class="block w-full border rounded-md px-3 py-2 focus:ring focus:ring-indigo-300" type="text" name="phone" :value="old('phone')" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2 text-red-500" />
                </div>
                 
               
            </div>
    
            <div class="grid grid-cols-2 gap-4 mt-4">
                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="font-semibold" />
                    <x-text-input id="password" class="block w-full border rounded-md px-3 py-2 focus:ring focus:ring-indigo-300" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>
    
                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="font-semibold" />
                    <x-text-input id="password_confirmation" class="block w-full border rounded-md px-3 py-2 focus:ring focus:ring-indigo-300" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
                </div>
            </div>
            
             <div class="grid gap-4 mt-4">
                {{-- <!-- Role -->
                <div>
                    <x-input-label for="role" :value="__('Select Role')" class="font-semibold" />
                    <select id="role" name="role" class="block w-full border rounded-md px-3 py-2 focus:ring focus:ring-indigo-300">
                        <option value="user" selected>User</option>
                        <option value="support_staff">Support Staff</option>
                        <option value="admin">Admin</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2 text-red-500" />
                </div>
     --}}
                 <!-- Email Address -->
                 <div>
                    <x-input-label for="email" :value="__('Email Address')" class="font-semibold" />
                    <x-text-input id="email" class="block w-full border rounded-md px-4 py-2 focus:ring focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>
            </div> 
            <div class="grid  gap-4 mt-4">
                {{-- <!-- Role -->
                <div>
                    <x-input-label for="role" :value="__('Select Role')" class="font-semibold" />
                    <select id="role" name="role" class="block w-full border rounded-md px-3 py-2 focus:ring focus:ring-indigo-300">
                        <option value="user" selected>User</option>
                        <option value="support_staff">Support Staff</option>
                        <option value="admin">Admin</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2 text-red-500" />
                </div>
     --}}
                <!-- Profile Picture -->
                <div>
                    <x-input-label for="profile_picture" :value="__('Upload Profile Picture')" class="font-semibold" />
                    <input id="profile_picture" class="block w-full border rounded-md px-3 py-2 focus:ring focus:ring-indigo-500" type="file" name="profile_picture" />
                    <x-input-error :messages="$errors->get('profile_picture')" class="mt-2 text-red-500" />
                </div>
            </div> 
    
            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
    
                <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
