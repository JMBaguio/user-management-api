<x-app-layout>
    <div class="py-6 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{}">

            {{-- ===== HEADER & AVATAR ===== --}}
            @include('profile.partials._header')

            {{-- ===== USER INFO (Name, Points, Actions) ===== --}}
            @include('profile.partials._user_info')

            {{-- ===== OWNER DASHBOARD ===== --}}
            @if (Auth::id() === $user->id)
                @include('profile.partials._dashboard')
            @endif

            {{-- ===== TABS ===== --}}
            @include('profile.partials._tabs')

            {{-- ===== TAB CONTENTS ===== --}}
            <div class="mt-6 space-y-12">
                @include('profile.partials._tab_products')
                @include('profile.partials._tab_reviews')

                @if ($user->isUpcycler())
                    @include('profile.partials._tab_works')
                @endif

                @if (Auth::id() === $user->id)
                    @include('profile.partials._tab_orders')
                @endif
            </div>

            {{-- ===== MODALS ===== --}}
            <x-review-modal :user="$user" />
            <x-report-modal :user="$user" />
        </div>
    </div>

    {{-- ===== STYLES ===== --}}
    @push('styles')
        <style>
            html { scroll-behavior: smooth; }
            .transition-all { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
            .group:hover .group-hover\:scale-105 { transform: scale(1.05); }
            @keyframes pulse { 0%,100%{transform:scale(1)} 50%{transform:scale(0.95)} }
            .button-click { animation: pulse 0.3s ease-in-out; }
        </style>
    @endpush

    {{-- ===== SCRIPTS (Handles all tabs dynamically) ===== --}}
@push('scripts')
    <script>
        (function () {
            const tabs = {
                products: document.getElementById('tab-products'),
                reviews : document.getElementById('tab-reviews'),
                works   : document.getElementById('tab-works'),
                orders  : document.getElementById('tab-orders')
            };

            const sections = {
                products: document.getElementById('products'),
                reviews : document.getElementById('reviews'),
                works   : document.getElementById('works'),
                orders  : document.getElementById('orders')
            };

            function activate(tabKey) {
                // Hide all sections
                Object.values(sections).forEach(sec => sec?.classList.add('hidden'));

                // Reset all buttons
                Object.values(tabs).forEach(btn => {
                    btn?.classList.remove('bg-[#E1D5B6]', 'font-semibold', 'shadow-md');
                });

                const btn = tabs[tabKey];
                const sec = sections[tabKey];
                if (!btn || !sec) return;

                sec.classList.remove('hidden');
                btn.classList.add('bg-[#E1D5B6]', 'font-semibold', 'shadow-md');

                sec.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }

            // Click handlers
            tabs.products?.addEventListener('click', () => activate('products'));
            tabs.reviews?.addEventListener('click',  () => activate('reviews'));
            tabs.works?.addEventListener('click',    () => activate('works'));
            tabs.orders?.addEventListener('click',   () => activate('orders'));

            // Default active tab based on user role
            const isUpcycler = @json($user->isUpcycler());
            const defaultTab = isUpcycler ? 'works' : 'products';
            activate(defaultTab);
        })();
    </script>
@endpush

</x-app-layout>