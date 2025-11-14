<x-guest-layout containerClass="max-w-[413px]" reverseColumns="true">
    {{-- Removed wrapper for smaller form size --}}
    <div class="max-w-[300px] mx-auto"> 
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="flex flex-col items-center mt-8">
            <h1 class="text-3xl font-poppins font-bold text-black dark:text-black">
                Sign Up
            </h1>
        </div>

        <!-- Name -->
 <div class="flex flex-col items-center mt-8" >
    <x-input-label for="fname" />
    <x-text-input 
        id="fname" 
        class="w-[295px] h-[40px] t-[405px] placeholder:text-[15px] placeholder:leading-[24px] placeholder:text-base placeholder:font-poppins" 
        type="text" 
        name="fname" 
        placeholder="First Name"
        :value="old('fname')" 
        required 
        autofocus 
        autocomplete="fname" 
    />
    <x-input-error :messages="$errors->get('fname')" class="mt-2" />
</div>

<div class="flex flex-col items-center mt-4"> 
    <x-input-label for="lname" />
    <x-text-input 
        id="lname" 
        class="w-[295px] h-[40px] t-[405px] placeholder:text-[15px] placeholder:leading-[24px] placeholder:text-base placeholder:font-poppins"  
        type="text" 
        name="lname" 
        placeholder="Last Name"
        :value="old('lname')"
        required 
        autocomplete="lname" 
    />
    <x-input-error :messages="$errors->get('lname')" class="mt-2" />
</div>


        <!-- Email Address -->
     <div class="flex flex-col items-center mt-4"> 
            <x-input-label for="email" />
            <x-text-input 
                id="email" 
                class="w-[295px] h-[40px] t-[405px] placeholder:text-[15px] placeholder:leading-[24px] placeholder:text-base placeholder:font-poppins"  
                type="text" 
                name="email" 
                placeholder="Email"
                :value="old('email')"
                required 
                autocomplete="username" 
            />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>
            
        <!-- Role Selection -->
        <div class="flex flex-col items-center mt-4">
    <x-input-label for="role"  />

    <select 
    id="role" 
    name="role" 
    class="w-[295px] h-[40px] t-[405px] text-[15px] leading-[24px] text-base font-poppins
           focus:border-[#B59F84]  focus:ring-2 focus:ring-[#B59F84] rounded-full shadow-sm"
    required
>
    <option  
        class="text-gray-400 text-[15px] leading-[24px] text-base font-poppins"
        value="" 
        disabled 
        {{ old('role') === null || old('role') === '' ? 'selected' : '' }}
    >
        Select Role
    </option>
git    <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>Thrifter</option>
    <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Upcycler</option>
</select>

<x-input-error :messages="$errors->get('role')" class="mt-2" />

</div>



  
        <!-- Password -->
    
        <div class="flex flex-col items-center mt-4">
            <x-input-label for="password"  />

            <x-text-input 
            id="password" 
            class="w-[295px] h-[40px] t-[405px] placeholder:text-[15px] placeholder:leading-[24px]
            placeholder:text-base placeholder:font-poppins"     
            type="password"
            name="password"
            placeholder="Password"
            :value="old('Password')"
            required 
            autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="flex flex-col items-center mt-4">
            <x-input-label for="password_confirmation"  />

            <x-text-input 
            id="password_confirmation" 
            class="w-[295px] h-[40px] t-[405px] placeholder:text-[15px] placeholder:leading-[24px]
            placeholder:text-base placeholder:font-poppins"
            type="password"
            name="password_confirmation" 
            placeholder="Confirm Password"
            :value="old('Confirm Password')"
            required 
            autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="flex flex-col items-center mt-7">
        <button type="submit" class="w-full flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-[25px] shadow-sm text-white bg-[#B59F84] hover:bg-[#a08e77] hover:scale-105 transition-all duration-200 ">
              <i class="fas fa-user-plus mr-2"></i>
              {{ __('Register') }}
            </button>
          </div>
          
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-[#B59F84] hover:text-[#a08e77] transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-[#B59F84] focus:ring-offset-2" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</div>
</x-guest-layout>