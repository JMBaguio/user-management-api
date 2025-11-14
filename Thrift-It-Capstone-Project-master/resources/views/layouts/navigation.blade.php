<nav
    class="fixed top-0 left-0 w-full bg-[#F4F2ED]  dark:bg-gray-800 text-gray-800 dark:text-gray-200 px-4 sm:px-6 md:px-6 py-4 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto" x-data="{ mobileMenuOpen: false }">
        <!-- Desktop Navigation -->
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ Auth::check() ? (Auth::user()->role === 2 ? route('admin.dashboard') : (Auth::user()->role === 1 ? route('upcycler') : route('dashboard'))) : url('/') }}"
                class="flex-shrink-0">
                <img src="{{ asset('images/logo.png') }}" alt="THRIFT - IT Logo" class="h-10 sm:h-12">
            </a>

            <!-- Navigation Links for Authenticated User -->
            @auth
                @php $role = Auth::user()->role; @endphp
                <div class="hidden md:flex items-center gap-2 lg:gap-4 ml-6 ">
                    @if ($role === 0)
                        <a href="{{ route('dashboard') }}" class="text-gray-700 dark:text-gray-200 hidden font-bold lg:block">Home</a>
                        <a href="{{ route('products.index') }}" class="text-gray-700  dark:text-gray-200 hidden font-bold lg:block">Sell</a>
                        <a href="{{ route('donations.hub') }}" class="text-gray-700 dark:text-gray-200 hidden font-bold lg:block">Donation
                            Hub</a>
                        <a href="{{ route('appointments.index') }}"
                            class="text-gray-700  dark:text-gray-200 hidden font-bold lg:block">Upcycle</a>
                    @elseif($role === 1)
                        <a href="{{ route('upcycler.index') }}" class="text-gray-700 dark:text-gray-200 hidden font-bold lg:block">
                            Appointments</a>
                        <a href="{{ route('works.index') }}" class="text-gray-700 dark:text-gray-200 hidden font-bold lg:block">Upcycling
                            Works</a>
                    @endif
                </div>
            @endauth

            <!-- Search Bar (Hide for Admin) -->
            @auth
                @if ($role !== 2)
                    <div
                        class="hidden md:flex items-center bg-[#F4F2ED] dark:bg-gray-800 px-4 rounded-full w-full max-w-md border border-gray-400 dark:text-gray-200  mx-4">
                        <form action="{{ route('search') }}" method="GET" class="flex w-full items-center">
                            <input type="text" name="query" value="{{ request('query') }}"
                                placeholder="Search for a product..."
                                class="w-full dark:placeholder:text-gray-200 outline-none text-sm bg-transparent border-0 focus:outline-none focus:ring-0 focus:border-0 focus:shadow-none"
                                required>
                            <button type="submit" class="ml-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 1 1 2.83 6.83l3.88 3.88a1 1 0 0 1-1.42 1.42l-3.88-3.88A4 4 0 0 1 8 4zm0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @endif
            @endauth
            <!-- Icons + Dropdown -->
            <div class="hidden md:flex items-center gap-2 lg:gap-4">
                @auth
                    @if ($role !== 2)
                        <a href="#" class="text-gray-700 dark:text-gray-200">🤍</a> <!-- Wishlist -->


                        <!-- Messages -->
                        <a href="{{ route('messages.index') }}" class="text-gray-700 relative">
                            <svg class="w-6 h-6 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8-1.325 0-2.58-.26-3.68-.725L3 20l1.32-3.96C3.474 15.003 3 13.55 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                        </a>
                        <!-- Notification Bell -->
                        <div id="notif-bell" x-data="{
                            open: false,
                            notifications: [],
                            markAsRead() {
                                fetch('{{ route('notifications.read') }}', {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Accept': 'application/json',
                                    }
                                }).then(() => {
                                    this.notifications.forEach(n => n.is_read = true);
                                });
                            }
                        }" x-init="notifications = {{ Js::from(\App\Models\Notification::where('user_id', Auth::id())->latest()->take(5)->get()) }};"
                            @new-notification.window="notifications.unshift($event.detail)">
                            <!-- Bell Icon -->
                            <button @click="open = !open; if(open) markAsRead()" class="relative focus:outline-none mt-1.5">
                                <!-- Use Heroicon Bell -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-700 dark:text-gray-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.971 8.971 0 0118 9.75V9a6 6 0 10-12 0v.75a8.971 8.971 0 01-2.311 6.022c1.742.68 3.55 1.17 5.454 1.31m5.714 0a24.048 24.048 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                </svg>
                                <!-- Notification Count Badge -->
                                <span x-show="notifications.filter(n => !n.is_read).length > 0"
                                    class="absolute -top-1 -right-1 bg-red-600 text-white  text-xs rounded-full px-1.5 py-0.5">
                                    <span x-text="notifications.filter(n => !n.is_read).length"></span>
                                </span>
                            </button>
                            <!-- Dropdown -->
                            <div x-show="open" @click.away="open = false" x-transition
                                class="absolute right-20 mt-2 w-80 bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden z-50 border border-gray-200">
                                <div class="px-4 py-2 bg-gray-50 border-b border-gray-200  dark:bg-gray-800 ">
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">Notifications</span>
                                </div>
                                <div class="max-h-64 overflow-y-auto divide-y divide-gray-100 custom-scroll ">
                                    <template x-for="notif in notifications" :key="notif.id">
                                        <a :href="notif.data.product_id ? `/products/${notif.data.product_id}` : '#'"
                                            class="block px-4 py-3 hover:bg-gray-50 transition">
                                            <p class="text-sm text-gray-700">
                                                <strong class="text-[#B59F84]"
                                                    x-text="notif.data.from_user || 'System'"></strong>
                                                <span
                                                    x-text="notif.data.message || (notif.data.content ? 'commented: ' + notif.data.content : '')"></span>
                                            </p>
                                            <span class="text-xs text-gray-400" x-text="notif.created_at"></span>
                                        </a>
                                    </template>
                                </div>
                            </div>
                        </div>
                    @endif
                @endauth
                @auth

                    <!-- Profile Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = ! open" class="text-gray-700 flex items-center dark:text-gray-200">
                            <span>{{ Auth::user()->fname }}</span>
                            <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 dark:text-gray-200 shadow-lg rounded-md z-50">

                            {{-- Hide Profile and Settings for Admin (role = 2) --}}
                            @if (Auth::user()->role != 2)
                                <a href="{{ route('profile.show', ['user' => Auth::id()]) }}"
                                    class="block px-4 py-2 text-gray-700 dark:text-gray-200  hover:bg-gray-200 dark:hover:bg-gray-700">Profile</a>
<!-- Settings Dropdown -->
<div x-data="{ settingsOpen: false }" class="relative">

    <!-- Toggle Button -->
    <button @click="settingsOpen = !settingsOpen"
        class="w-full text-left flex items-center justify-between px-4 py-2 text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md transition-colors duration-200">
        <span class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Settings
        </span>
        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': settingsOpen }"
            fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </button>

    <!-- Settings Submenu -->
    <div x-show="settingsOpen" @click.away="settingsOpen = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
        class="absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 shadow-lg rounded-md border border-gray-200 dark:border-gray-700 z-50">

        <!-- Menu Sections -->
        <!-- Personal Information -->
        <div class="px-4 py-2 bg-gray-50 dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
            <span class="text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wide flex items-center gap-2">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Personal Information
            </span>
        </div>
        <a href="{{ route('profile.edit') }}"
            class="block px-4 py-3 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center gap-3">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-200" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Update Profile Information
        </a>

        <!-- Security & Sign-in -->
        <div class="px-4 py-2 bg-gray-50 dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
            <span class="text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wide flex items-center gap-2">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                Security & Sign-in
            </span>
        </div>
        <a href="{{ route('profile.edit1') }}"
            class="block px-4 py-3 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center gap-3">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-200" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
            </svg>
            Update Password
        </a>

        <!-- Data & Privacy -->
        <div class="px-4 py-2 bg-gray-50 dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
            <span class="text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wide flex items-center gap-2">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                Data & Privacy
            </span>
        </div>
        <a href="{{ route('profile.edit2') }}"
            class="block px-4 py-3 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center gap-3">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-200" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
            Data & Privacy
        </a>

        <!-- Payment & Subscription -->
        <div class="px-4 py-2 bg-gray-50 dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
            <span class="text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wide flex items-center gap-2">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>
                Payment & Subscription
            </span>
        </div>
        <a href="{{ route('pricing.index') }}"
            class="block px-4 py-3 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center gap-3">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-200" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
            </svg>
            Pricing Plans
        </a>
    </div>
</div>

                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left block px-4 py-2 text-gray-700 dark:text-gray-200  dark:hover:bg-gray-00 hover:bg-gray-200">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('register') }}"
                        class="inline-flex items-center justify-center bg-[#B59F84] dark:text-gray-200 text-white 
        px-[20px] py-1.5 rounded-[25px] text-base font-semibold 
        hover:bg-[#a08e77] hover:scale-105 transition-all duration-200  w-[100px]">Sign
                        up</a>
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center justify-center dark:text-gray-200 bg-[#B59F84] text-white 
        px-[20px] py-1.5 rounded-[25px] text-base font-semibold 
        hover:bg-[#a08e77] hover:scale-105 transition-all duration-200 w-[100px]">Login</a>
                @endauth
            </div>
            <!-- Mobile Navbar -->
            <div
                class="flex items-center justify-between md:hidden w-full px-4 py-1 bg-[#F4F2ED]  dark:bg-gray-800 dark:text-gray-200">
                <!-- Search Bar -->
                <div class="flex-1 mx-2">
                    <form action="{{ route('search') }}" method="GET"
                        class="flex items-center bg-white  dark:bg-gray-800 dark:text-gray-200 px-3 py-2 rounded-full shadow-sm border">
                        <input type="text" name="query" value="{{ request('query') }}"
                            placeholder="Search for a product..."
                            class="w-full border-none outline-none text-sm bg-transparent text-gray-700 dark:text-gray-200" required>
                        <button type="submit" class="ml-2 text-gray-500 hover:text-blue-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 1 1 2.83 6.83l3.88 3.88a1 1 0 0 1-1.42 1.42l-3.88-3.88A4 4 0 0 1 8 4zm0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Icons: Notifications + Menu -->
                <div class="flex items-center space-x-3">
                    <!-- Notification Bell -->
                    <div id="notif-bell" x-data="{ open: false, notifications: [], markAsRead() { fetch('{{ route('notifications.read') }}', { method: 'POST', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' } }).then(() => { this.notifications.forEach(n => n.is_read = true); }); } }" x-init="notifications = {{ Js::from(\App\Models\Notification::where('user_id', Auth::id())->latest()->take(5)->get()) }};"
                        @new-notification.window="notifications.unshift($event.detail)">
                          <!-- Bell Icon -->
                            <button @click="open = !open; if(open) markAsRead()" class="relative focus:outline-none mt-1.5">
                                <!-- Use Heroicon Bell -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-700  dark:text-gray-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.971 8.971 0 0118 9.75V9a6 6 0 10-12 0v.75a8.971 8.971 0 01-2.311 6.022c1.742.68 3.55 1.17 5.454 1.31m5.714 0a24.048 24.048 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                </svg>
                                <!-- Notification Count Badge -->
                                <span x-show="notifications.filter(n => !n.is_read).length > 0"
                                    class="absolute -top-1 -right-1 bg-red-600 text-white text-xs rounded-full px-1.5 py-0.5">
                                    <span x-text="notifications.filter(n => !n.is_read).length"></span>
                                </span>
                            </button>

                               <!-- Dropdown -->
                            <div x-show="open" @click.away="open = false" x-transition
                                class="absolute right-20 mt-2 w-80 bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden z-50 border border-gray-200">
                                <div class="px-4 py-2 bg-gray-50 border-b border-gray-200  dark:bg-gray-800 ">
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-200">Notifications</span>
                                </div>
                                <div class="max-h-64 overflow-y-auto divide-y divide-gray-100 custom-scroll ">
                                    <template x-for="notif in notifications" :key="notif.id">
                                        <a :href="notif.data.product_id ? `/products/${notif.data.product_id}` : '#'"
                                            class="block px-4 py-3 hover:bg-gray-50 transition">
                                            <p class="text-sm text-gray-700">
                                                <strong class="text-[#B59F84]"
                                                    x-text="notif.data.from_user || 'System'"></strong>
                                                <span
                                                    x-text="notif.data.message || (notif.data.content ? 'commented: ' + notif.data.content : '')"></span>
                                            </p>
                                            <span class="text-xs text-gray-400" x-text="notif.created_at"></span>
                                        </a>
                                    </template>
                                </div>
                            </div>
                    </div>

                    <!-- Hamburger Menu -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="p-2 rounded-md text-gray-700 dark:text-gray-200 hover:bg-gray-200  dark:hover:bg-gray-800 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" x-transition
                class="mobile-menu-dropdown fixed top-[90px] inset-x-0 bg-white dark:bg-gray-800 dark:text-gray-200 shadow-lg border-t border-gray-200 md:hidden z-50 max-h-[70vh] overflow-y-auto">
                <div class="flex flex-col space-y-0 px-4 py-4">
                    @auth
                        @if ($role !== 2)
                            <a href="#"
                                class="flex items-center text-gray-700  dark:text-gray-200 py-3 hover:text-[#B59F84] border-b border-gray-100">
                                <span class="mr-3 text-lg">🤍</span>
                                <span class="font-medium">Wishlist</span>
                            </a>

                            <a href="{{ route('messages.index') }}"
                                class="flex items-center text-gray-700 dark:text-gray-200 py-3 hover:text-[#B59F84] border-b border-gray-100">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8-1.325 0-2.58-.26-3.68-.725L3 20l1.32-3.96C3.474 15.003 3 13.55 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                                <span class="font-medium">Messages</span>
                            </a>
                        @endif

                        @if ($role === 0)
                            <a href="{{ route('dashboard') }}"
                                class="flex items-center text-gray-700 dark:text-gray-200 py-3 hover:text-[#B59F84] border-b border-gray-100 font-medium">Home</a>
                            <a href="{{ route('products.index') }}"
                                class="flex items-center text-gray-700 dark:text-gray-200 py-3 hover:text-[#B59F84] border-b border-gray-100 font-medium">Sell</a>
                            <a href="{{ route('donations.hub') }}"
                                class="flex items-center text-gray-700  dark:text-gray-200 py-3 hover:text-[#B59F84] border-b border-gray-100 font-medium">Donation
                                Hub</a>
                            <a href="{{ route('appointments.index') }}"
                                class="flex items-center text-gray-700 dark:text-gray-200 py-3 hover:text-[#B59F84] border-b border-gray-100 font-medium">Upcycle</a>
                        @elseif($role === 1)
                            <a href="{{ route('upcycler.index') }}"
                                class="flex items-center text-gray-700  dark:text-gray-200 py-3 hover:text-[#B59F84] border-b border-gray-100 font-medium">Manage
                                Appointments</a>
                        @endif

                        <a href="{{ route('profile.show', ['user' => Auth::id()]) }}"
                            class="flex items-center text-gray-700 dark:text-gray-200 py-3 hover:text-[#B59F84] border-b border-gray-100 font-medium">Profile</a>

                        <!-- Mobile Settings Dropdown -->
                        <div x-data="{ mobileSettingsOpen: false }" class="relative border-b border-gray-100 dark:text-gray-200">
                            <button @click="mobileSettingsOpen = !mobileSettingsOpen"
                                class="w-full text-left flex items-center justify-between text-gray-700 dark:text-gray-200 py-3 hover:text-[#B59F84] font-medium">
                                <span>Settings</span>
                                <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': mobileSettingsOpen }"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <!-- Mobile Settings Submenu -->
                            <div x-show="mobileSettingsOpen" x-transition class="ml-4 mt-2 space-y-0 pb-2  dark:bg-gray-800">
                                <!-- Personal Information -->
                                <div class="px-2 py-1  dark:bg-gray-800">
                                    <span class="text-xs font-semibold text-gray-500 dark:text-gray-200  dark:bg-gray-800 uppercase tracking-wide">Personal
                                        Information</span>
                                </div>
                                <a href="{{ route('profile.edit') }}"
                                    class="block px-2 py-2 text-sm text-gray-600 dark:text-gray-200 hover:text-[#B59F84]">
                                    Update Profile Information
                                </a>

                                <!-- Security & Sign-in -->
                                <div class="px-2 py-1 mt-2 dark:bg-gray-800">
                                    <span class="text-xs font-semibold text-gray-500 dark:text-gray-200  uppercase tracking-wide">Security &
                                        Sign-in</span>
                                </div>
                                <a href="{{ route('profile.edit1') }}#update-password"
                                    class="block px-2 py-2 text-sm text-gray-600  dark:text-gray-200 hover:text-[#B59F84]">
                                    Update Password
                                </a>

                                <!-- Data & Privacy -->
                                <div class="px-2 py-1 mt-2">
                                    <span class="text-xs font-semibold text-gray-500 dark:text-gray-200 uppercase tracking-wide">Data &
                                        Privacy</span>
                                </div>
                                <a href="{{ route('profile.edit2') }}"
                                    class="block px-2 py-2 text-sm text-gray-600 dark:text-gray-200 hover:text-[#B59F84]">
                                    Data & Privacy
                                </a>

                                <!-- Payment & Subscription -->
                                <div class="px-2 py-1 mt-2">
                                    <span class="text-xs font-semibold text-gray-500 dark:text-gray-200 uppercase tracking-wide">Payment &
                                        Subscription</span>
                                </div>
                                <a href="{{ route('pricing.index') }}"
                                    class="block px-2 py-2 text-sm text-gray-600 dark:text-gray-200 hover:text-[#B59F84]">
                                    Pricing Plans
                                </a>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit"
                                class="w-full text-left flex items-center text-gray-700 dark:text-gray-200 py-3 hover:text-[#B59F84] font-medium">
                                Log Out
                            </button>
                        </form>
                    @else
                        <a href="{{ route('register') }}"
                            class="flex items-center text-gray-700 py-3  dark:text-gray-200 hover:text-[#B59F84] border-b border-gray-100 font-medium">Sign
                            up</a>
                        <a href="{{ route('login') }}"
                            class="flex items-center text-gray-700 py-3  dark:text-gray-200 hover:text-[#B59F84] border-b border-gray-100 font-medium">Login</a>
                    @endauth
                </div>
            </div>
</nav>
<style>
    body {
        padding-top: 72px;
        /* adjust according to your nav height */
    }

    /* Fix mobile menu positioning on private chat page */
    @media (max-width: 767px) {
        .mobile-menu-dropdown {
            position: fixed !important;
            top: 90px !important;
            left: 0 !important;
            right: 0 !important;
            width: 100% !important;
            transform: translateX(0) !important;
            margin: 0 !important;
            max-width: 100vw !important;
        }
    }
</style>
