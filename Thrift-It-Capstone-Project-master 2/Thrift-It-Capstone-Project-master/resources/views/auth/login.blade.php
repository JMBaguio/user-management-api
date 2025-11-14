
 
<x-guest-layout containerClass="max-w-[400px] bg-[#F2F8FC]">
    
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
<div class="max-w-[377px] h-[404px]   mx-auto">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-4 w-[101px] h-[41px] flex items-center justify-center mx-auto">
            <h1 class="text-3xl font-poppins font-semibold text-black">Login</h1>
        </div>


        <!-- Email Address -->
        <div class="flex flex-col items-center mt-10">
    <x-input-label for="email"  />
    
            <x-text-input 
            id="email" 
            class="w-[295px] h-[40px] t-[405px] placeholder:text-[15px] placeholder:leading-[24px] placeholder:text-base  placeholder:font-poppins" 
            type="email" 
            name="email" 
            :value="old('email')" 
            placeholder="Email or Username"
            required 
            autofocus 
            autocomplete="username" 
        />



            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>


        <!-- Password -->
        <div class="flex flex-col items-center mt-4">
            <x-input-label for="password" />
            <x-text-input 
            id="password" 
            class="w-[295px] h-[40px] t-[405px] placeholder:text-[15px] placeholder:leading-[24px] placeholder:text-base  placeholder:font-poppins" 
            type="password" 
            name="password" 
            :value="old('password')" 
            placeholder="Password"
            required 
            autofocus 
            autocomplete="current-password" 
        />
        

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="flex flex-col items-center mt-6">
       <button type="submit" 
            class="w-[295px] h-[36px] rounded-[25px] px-4 py-2 border border-transparent text-sm font-medium shadow-sm text-white bg-[#B59F84] hover:bg-[#a08e77] hover:scale-105 transition-all duration-200">
            <i class="fas fa-sign-in-alt"></i>
            {{ __('Log in') }}
        </button>

        </div>

        <!-- Remember Me -->
        <div class="flex ml-[40px] mt-4"> 
            <label for="remember_me" class="inline-flex items-center cursor-pointer select-none gap-2">
                <input id="remember_me" type="checkbox" class="h-5 w-5 rounded border-gray-300 text-[#B59F84] focus:ring-[#B59F84] transition-all duration-150 shadow-sm" name="remember">
                <span class="text-base text-gray-700 font-medium">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex ml-[100px] mt-4 ">
            <span class="text-black font-poppins">{{ __('Don\'t have an account?') }}</span>
            <a href="{{ route('register') }}" 
            class="underline text-sm text-[#634600] hover:text-[#a08e77] transition-colors duration-200 focus:ring-[#B59F84]">
                <i class="fas fa-user-plus mr-1"></i>
                <span class="italic">{{ __('Sign Up') }}</span>
            </a>
        </div>

        <div class="flex ml-[190px] mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-[#634600] hover:text-[#a08e77] transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-[#B59F84] focus:ring-offset-2" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }} 
                </a>
            @endif
        </div>
    </form>
</div> 
</x-guest-layout>