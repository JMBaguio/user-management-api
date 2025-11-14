<!-- Main Grid -->
<div class="grid lg:grid-cols-5 gap-8">

    <!-- Left Sidebar -->
    <div class="lg:col-span-2 space-y-8 lg:sticky lg:top-6 self-start">

        <!-- Leaderboard -->
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 transform transition-all duration-300 hover:shadow-3xl">
            <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-6 flex items-center gap-3">
                <div class="w-8 h-8 bg-gradient-to-br from-yellow-400 to-amber-500 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                Top Contributors
            </h4>
@php
    $topContributors = $posts
        ->groupBy('user_id')
        ->map(fn($userPosts) => [
            'user' => $userPosts->first()->user,
            'points' => $userPosts->first()->user->points ?? 0,
            'post_count' => $userPosts->count()
        ])
        // Exclude admins
        ->filter(fn($contributor) => $contributor['user']->role === 0) 
        ->sortByDesc('points')
        ->take(5)
        ->values();
@endphp
            <div class="space-y-3">
            @foreach($topContributors as $index => $contributor)
                <div class="group flex items-center gap-4 p-4 rounded-2xl 
                    bg-gradient-to-r {{ $index === 0 ? 'from-amber-50 to-yellow-50 dark:from-amber-900/30 dark:to-yellow-900/20' : 'hover:from-emerald-50/50 hover:to-teal-50/50 dark:hover:from-emerald-900/20 dark:hover:to-teal-900/20' }} 
                    transition-all duration-300 border border-transparent {{ $index === 0 ? 'border-amber-200 dark:border-amber-700' : '' }}">
                    
                    <!-- Medal -->
                    <div class="relative">
                        @switch($index)
                            @case(0)
                                <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-amber-500 rounded-full flex items-center justify-center shadow-lg ring-4 ring-yellow-300/50">
                                    <span class="text-white font-bold text-sm">1</span>
                                </div>
                                @break
                            @case(1)
                                <div class="w-10 h-10 bg-gradient-to-br from-gray-300 to-gray-400 rounded-full flex items-center justify-center shadow-lg ring-4 ring-gray-300/50">
                                    <span class="text-white font-bold text-sm">2</span>
                                </div>
                                @break
                            @case(2)
                                <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center shadow-lg ring-4 ring-orange-300/50">
                                    <span class="text-white font-bold text-sm">3</span>
                                </div>
                                @break
                            @default
                                <div class="w-10 h-10 bg-gray-300 dark:bg-gray-700 rounded-full flex items-center justify-center shadow-md">
                                    <span class="text-white font-bold text-sm">{{ $index + 1 }}</span>
                                </div>
                        @endswitch
                    </div>

                    <!-- User Info -->
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-full flex items-center justify-center text-white text-xs font-bold">
                                {{ substr($contributor['user']->fname ?? 'A', 0, 1) }}
                            </div>
                            <p class="font-semibold text-gray-800 dark:text-gray-100 truncate">
                                {{ $contributor['user']->fname ?? 'Community Member' }}
                            </p>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            {{ $contributor['post_count'] }} post{{ $contributor['post_count'] > 1 ? 's' : '' }}
                        </p>
                    </div>

                    <!-- Points -->
                    <div class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-md">
                        {{ $contributor['points'] }} pts
                    </div>
                </div>
            @endforeach

                @if($topContributors->isEmpty())
                    <div class="text-center py-8">
                        <div class="w-16 h-16 mx-auto bg-gray-100 dark:bg-gray-700 rounded-2xl flex items-center justify-center mb-3">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400">No contributors yet</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Community Guidelines -->
        <div class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-lg rounded-3xl border border-gray-200/50 dark:border-gray-700/50 p-6">
            <h4 class="text-lg font-bold text-gray-800 dark:text-white mb-4 flex items-center gap-3">
                <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                Community Guidelines
            </h4>
            <ul class="space-y-3 text-sm text-gray-600 dark:text-gray-300">
                @foreach([
                    'Share factual, evidence-based environmental information',
                    'Be respectful and constructive in discussions',
                    'Credit sources and provide references when possible',
                    'Focus on solutions and positive environmental actions'
                ] as $rule)
                    <li class="flex items-start gap-3">
                        <div class="w-5 h-5 bg-emerald-100 dark:bg-emerald-900/50 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-3 h-3 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span>{{ $rule }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>