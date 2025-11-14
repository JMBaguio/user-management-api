<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Subscription Plans') }}
        </h2>
    </x-slot>

    <section class="bg-gradient-to-br  dark:from-gray-900 dark:to-gray-800 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="flex items-center justify-center gap-4 mb-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-[#E1D5B6] to-[#D5C39A] rounded-2xl flex items-center justify-center shadow-lg ring-4 ring-white/20">
                        <svg class="w-10 h-10 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-5xl font-bold text-gray-800 dark:text-white mb-4">
                            Choose Your Thrift-It Plan
                        </h2>
                        <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                            Unlock more listings, enjoy smoother upcycle bookings, and grow your thrift journey.
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid lg:grid-cols-3 gap-8 lg:gap-6 max-w-6xl mx-auto">
                
                <!-- Starter Rack -->
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-[#E1D5B6] to-[#D5C39A] rounded-3xl blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                    <div class="relative bg-white dark:bg-gray-800 rounded-3xl shadow-2xl border border-[#E9DFC7] dark:border-gray-700 p-8 h-full flex flex-col transform hover:scale-[1.02] transition-all duration-300">
                        <div class="text-center mb-8">
                            <div class="w-16 h-16 bg-gradient-to-br from-[#F8F4EC] to-[#F1E9D2] rounded-2xl flex items-center justify-center mx-auto mb-4 border border-[#E9DFC7]">
                                <svg class="w-8 h-8 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Starter Rack</h3>
                            <p class="text-gray-600 dark:text-gray-400">Perfect for new thrifters starting small.</p>
                        </div>
                        
                        <div class="flex justify-center items-baseline my-6">
                            <span class="text-5xl font-bold text-gray-800 dark:text-white">₱99</span>
                            <span class="ml-2 text-gray-500 dark:text-gray-400 text-lg">/month</span>
                        </div>

                        <ul class="mb-8 space-y-4 flex-1">
                            <li class="flex items-center space-x-3">
                                <svg class="flex-shrink-0 w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">Up to <span class="font-semibold">10 listings</span></span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <svg class="flex-shrink-0 w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">2 upcycle bookings</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <svg class="flex-shrink-0 w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">Basic support</span>
                            </li>
                        </ul>

                        <a href="{{ route('checkout','Starter Rack' )}}" 
                           class="w-full bg-gradient-to-r from-[#E1D5B6] to-[#D5C39A] hover:from-[#D5C39A] hover:to-[#C9B284] text-gray-800 font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl text-center">
                            Get started
                        </a>
                    </div>
                </div>

                <!-- Bargain Shelf -->
                <div class="relative group lg:scale-105">
                    <div class="absolute -inset-1 bg-gradient-to-r from-[#B59F84] to-[#9C8770] rounded-3xl blur opacity-30 group-hover:opacity-50 transition duration-300"></div>
                    <div class="relative bg-white dark:bg-gray-800 rounded-3xl shadow-2xl border-2 border-[#B59F84] dark:border-[#9C8770] p-8 h-full flex flex-col transform hover:scale-[1.02] transition-all duration-300">
                        <div class="text-center mb-8">
                            <div class="w-16 h-16 bg-gradient-to-br from-[#B59F84] to-[#9C8770] rounded-2xl flex items-center justify-center mx-auto mb-4 border border-[#E9DFC7]">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Bargain Shelf</h3>
                            <p class="text-gray-600 dark:text-gray-400">Great for growing thrifters & upcycle shops.</p>
                        </div>
                        
                        <div class="flex justify-center items-baseline my-6">
                            <span class="text-5xl font-bold text-gray-800 dark:text-white">₱279</span>
                            <span class="ml-2 text-gray-500 dark:text-gray-400 text-lg">/month</span>
                        </div>

                        <ul class="mb-8 space-y-4 flex-1">
                            <li class="flex items-center space-x-3">
                                <svg class="flex-shrink-0 w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">Up to <span class="font-semibold">30 listings</span></span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <svg class="flex-shrink-0 w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">5 upcycle bookings</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <svg class="flex-shrink-0 w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">Featured spot in search</span>
                            </li>
                        </ul>

                        <a href="{{ route('checkout','Bargain Shelf' )}}" 
                           class="w-full bg-gradient-to-r from-[#B59F84] to-[#9C8770] hover:from-[#9C8770] hover:to-[#8A7560] text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl text-center">
                            Get started
                        </a>
                    </div>
                </div>

                <!-- Vintage Vault -->
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-[#8A7560] to-[#6B5B48] rounded-3xl blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                    <div class="relative bg-white dark:bg-gray-800 rounded-3xl shadow-2xl border border-[#E9DFC7] dark:border-gray-700 p-8 h-full flex flex-col transform hover:scale-[1.02] transition-all duration-300">
                        <div class="text-center mb-8">
                            <div class="w-16 h-16 bg-gradient-to-br from-[#8A7560] to-[#6B5B48] rounded-2xl flex items-center justify-center mx-auto mb-4 border border-[#E9DFC7]">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Vintage Vault</h3>
                            <p class="text-gray-600 dark:text-gray-400">For power thrifters & upcycle entrepreneurs.</p>
                        </div>
                        
                        <div class="flex justify-center items-baseline my-6">
                            <span class="text-5xl font-bold text-gray-800 dark:text-white">₱499</span>
                            <span class="ml-2 text-gray-500 dark:text-gray-400 text-lg">/month</span>
                        </div>

                        <ul class="mb-8 space-y-4 flex-1">
                            <li class="flex items-center space-x-3">
                                <svg class="flex-shrink-0 w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">100+ listings</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <svg class="flex-shrink-0 w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">15 upcycle bookings</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <svg class="flex-shrink-0 w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">Premium placement & support</span>
                            </li>
                        </ul>

                        <a href="{{ route('checkout','Vintage Vault') }}" 
                           class="w-full bg-gradient-to-r from-[#8A7560] to-[#6B5B48] hover:from-[#6B5B48] hover:to-[#5A4B3A] text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl text-center">
                            Get started
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>