<x-app-layout>
    <!-- Alpine.js Root -->
    <div x-data="{ showPostModal: false }" class="relative">

        <!-- Main Content -->
        @include('eco-posts.partials._header')
        @include('eco-posts.partials._messages')
        @include('eco-posts.partials._sidebar')
        @include('eco-posts.partials._feed')

        <!-- Floating Button + Modal -->
        @include('eco-posts.partials._fab')
        @include('eco-posts.partials._modal')
    </div>

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Animations -->
    <style>
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes slideDown { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in { animation: fadeIn 0.6s ease-out forwards; }
        .animate-slide-down { animation: slideDown 0.5s ease-out forwards; }
    </style>
</x-app-layout>